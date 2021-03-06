<?php

namespace App\Http\Controllers;

use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use App\Surat;
use function Couchbase\defaultDecoder;
use Faker\Provider\File;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class SuratController extends Controller
{
    Public function GetSurat()
    {
        if (Session::get('auth') == "admin") {
            $surat = DB::table('surats')
                ->where('arsip_status', '0')
                ->get();
        } else {
            $surat = DB::table('surats')
                ->where('arsip_status', '0')
                ->where('id_users', Session::get('clogid'))
                ->get();
        }

        return view('surat/surat', ['surat' => $surat]);
    }

    Public function GetArsipSurat()
    {
        $surat = DB::table('surats')
            ->where('arsip_status', '1')
            ->get();
        return view('surat/suratarsip', ['surat' => $surat]);
    }

    Public function showCreateSurat()
    {
        $surat = DB::table('surats')
            ->orderBy('id_surat', 'desc')
            ->first();
        return view('surat/create_surat', compact('surat'));
    }

    Public function CreateSurat(Request $request)
    {

        $ltime = date('Y-m-d H:i:s');
        $ldate = date('Y-m-d');

        $surat = new Surat;

        $surat->no_surat = $request->no_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->tipe_surat = $request->tipe_surat;
        $surat->asal_surat = $request->asal_surat;
        $surat->dari = $request->dari;
        $surat->id_users = $request->id_users;
        $surat->tujuan_surat_keluar = $request->tujuan_surat_keluar;
        $surat->perihal = $request->perihal;
        $surat->tembusan = $request->tembusan;
        $surat->no_berkas = $request->no_berkas;
        $surat->status_surat = "Menunggu Revisi";
        $surat->status_disposisi = "Tidak ada";

        $file_surat = $request->file('file_surat');
        $surat->file_surat = $file_surat->getClientOriginalName();
        $surat->file_path = $file_surat->store('/storage/files');
        $nama_file = $file_surat->store('public/files');

        $surat->keterangan = $request->keterangan;
        $surat->tanggal_entry = $ldate;
        $surat->waktu_entry = $ltime;

        $surat->save();

        return redirect('admin/get-surat')
            ->with('popup', 'Berhasil Memasukkan Surat');
    }

    public function DownloadSurat($id)
    {
        $surat = DB::table('surats')->where('id_surat', $id)
            ->first();
        $file = public_path() . '/' . $surat->file_path;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, $surat->file_surat, $headers);
    }

    public function DeleteSurat($id)
    {
        $user = DB::table('surats')->where('id_surat', $id)->delete();
        return redirect('admin/get-surat')->with('popup', 'Berhasil Menghapus Surat');
    }

    public function ArsipSurat($id)
    {
        DB::table('surats')
            ->where('id_surat', $id)
            ->update(['arsip_status' => 1]);
        return redirect('admin/get-surat')->with('popup', 'Berhasil Mengarsipkan Surat');
    }

    public function PulihSurat($id)
    {
        DB::table('surats')
            ->where('id_surat', $id)
            ->update(['arsip_status' => 0]);

        return redirect('admin/get-arsipsurat')->with('popup', 'Berhasil Memulihkan surat');
    }

    public function RevisiSurat($id)
    {
        if (Session::get('auth') == 'admin' || Session::get('auth') == 'sekretaris') {
            DB::table('surats')
                ->where('id_surat', $id)
                ->update(['status_surat' => 'Accepted']);
            return redirect('admin/get-surat')->with('popup', 'Surat Diterima');
        } else {
            DB::table('surats')
                ->where('id_surat', $id)
                ->update(['status_disposisi' => "Sudah"]);
            DB::table('disposisi_surats')
                ->where('id_surats', $id)
                ->update(['status_surat_disposisi' => "Sudah"]);
            return redirect('admin/get-surat')->with('popup', 'Revisi Selesai');
        }
    }

}
