<?php

namespace App\Http\Controllers;
use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use App\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    Public function GetSurat()
    {
        $surat = DB::table('surats')
                ->get() ;
        return view('admin/surat', ['surat'=>$surat]);
    }

    Public function showCreateSurat()
    {    
        return view('admin/create_surat');
    }

    Public function CreateSurat(Request $request)
    {
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
        $surat->file_surat = $request->file_surat;
        $surat->file_path = $request->file_path;
        $surat->keterangan = $request->keterangan;
        $surat->tanggal_entry = $request->tanggal_entry;
        $surat->waktu_entry = $request->waktu_entry;


        $surat->save();

        return redirect('admin/get-surat');
    }

}
