<?php

namespace App\Http\Controllers;

use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use App\Surat;
use App\Disposisi;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DisposisiController extends Controller
{
    Public function GetDisposisi()
    {
        $disposisi = DB::table('disposisi_surats')
            ->join('surats', 'disposisi_surats.id_surats', '=', 'surats.id_surat')
            ->join('users','surats.id_users','=','users.id_user')
            ->select('disposisi_surats.*', 'surats.no_surat','users.name')
            ->get();
        $surat = Surat::all();
        return view('disposisi/disposisi', compact('disposisi', 'surat'));
    }

    Public function showCreateDisposisi($id)
    {
        $disposisi = DB::table('disposisi_surats')
            ->join('surats', 'disposisi_surats.id_surats', '=', 'surats.id_surat')
            ->join('users','surats.id_users','=','users.id_user')
            ->select('disposisi_surats.*', 'surats.no_surat','users.name','users.id_user')
            ->where('disposisi_surats.id_surats',$id)
            ->first();
        return view('disposisi/create_disposisi', compact('disposisi'));
    }

    Public function CreateDisposisi(Request $request)
    {

        $ltime = date('H:i:s');
        $ldate = date('Y-m-d');

        $disposisi = new Disposisi;

        $disposisi->dari = $request->dari;
        $disposisi->untuk = $request->untuk;
        $disposisi->id_surats = $request->id_surats;
        $disposisi->disposisi_status = $request->disposisi_status;
        $disposisi->status_surat_disposisi = $request->status_surat_disposisi;
        $disposisi->tipe_surat_disposisi = $request->tipe_surat_disposisi;
        $disposisi->tanggal_disposisi = $ldate;
        $disposisi->waktu_disposisi = $ltime;

        $disposisi->save();

        return redirect('admin/get-disposisi')->with('popup', 'Berhasil Menambahkan Disposisi');
    }

    Public function showEditDisposisi($id)
    {
        $disposisi = DB::table('disposisi_surats')
            ->where('id_disposisi', $id)
            ->join('surats', 'disposisi_surats.id_surats', '=', 'surats.id_surat')
            ->join('users','surats.id_users','=','users.id_user')
            ->select('disposisi_surats.*', 'surats.no_surat','users.name','users.id_user')
            ->first();
        return view('disposisi/edit_disposisi', compact('disposisi', 'surat'));
    }

    Public function pilihDisposisi()
    {
        $surat = DB::table('surats')
            ->where('arsip_status', '0')
            ->get();
        return view('disposisi/pilih_disposisi', ['surat' => $surat]);
    }

    public function DeleteDisposisi($id)
    {
        $user = DB::table('disposisi_surats')->where('id_disposisi', $id)->delete();
        return redirect('admin/get-disposisi')->with('popup', 'Berhasil Menghapus Disposisi');
    }

    public function updateDisposisi(Request $request)
    {
        $ltime = date('H:i:s');
        $ldate = date('Y-m-d');

        $disposisi = array(
            'id_disposisi' => $request->id_disposisi,
            'id_surats' => $request->id_surats,
            'dari' => $request->dari,
            'untuk' => $request->untuk,
            'disposisi_status' => $request->disposisi_status,
            'status_surat_disposisi' => $request->status_surat_disposisi,
            'tipe_surat_disposisi' => $request->tipe_surat_disposisi,
            'tanggal_disposisi' => $ldate,
            'waktu_disposisi' => $ltime
        );

        DB::table('disposisi_surats')
            ->where('id_disposisi', $request->id_disposisi)
            ->update($disposisi);
        return redirect('admin/get-disposisi')->with('popup', 'Berhasil Edit Disposisi Surat '. $request->no_surat);;
    }

}
