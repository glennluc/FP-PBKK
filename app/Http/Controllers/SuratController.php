<?php

namespace App\Http\Controllers;
use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use App\Surat;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class SuratController extends Controller
{
    Public function GetSurat()
    {
        $surat = DB::table('surats')
                ->get() ;
        return view('surat/surat', ['surat'=>$surat]);
    }

    Public function showCreateSurat()
    {    
        return view('surat/create_surat');
    }

    Public function CreateSurat(Request $request)
    {
//        $this->validate($request,[
//            'file' => 'required|file|max:10000'
//        ]);
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
        $surat->status_surat = $request->status_surat;
        $surat->status_disposisi = $request->status_disposisi;

        $file_surat = $request->file('file_surat');
        $surat->file_surat = $file_surat->getClientOriginalName();
        $surat->file_path = $file_surat->store('public/files');
//        $file = File::create([
//            'title' => $request->title ?? $file_surat->getClientOriginalName(),
//            'filename' => $file_surat->store('public/files')
//        ]);

        $surat->keterangan = $request->keterangan;
        $surat->tanggal_entry = $ldate;
        $surat->waktu_entry = $ltime;

        $surat->save();

        return redirect('admin/get-surat');
//            ->withSuccess(sprintf('Surat berhasil dimasukkan'));
    }

}
