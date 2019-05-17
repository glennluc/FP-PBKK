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
                ->get() ;
        return view('disposisi/disposisi', ['disposisi'=>$disposisi]);
    }

    Public function showCreateDisposisi()
    {    
        return view('disposisi/create_disposisi');
    }

    Public function CreateDisposisi(Request $request)
    {

        $ltime = date('Y-m-d H:i:s');
        $ldate = date('Y-m-d');

        $disposisi = new Disposisi;

        $disposisi->dari = $request->dari;
        $disposisi->untuk = $request->untuk;
        $disposisi->disposisi_status = $request->disposisi_status;
        $disposisi->status_surat_disposisi = $request->status_surat_disposisi;
        $disposisi->tipe_surat_disposisi = $request->tipe_surat_disposisi;
        $disposisi->tanggal_disposisi = $ldate;
        $disposisi->waktu_disposisi = $ltime;

        $disposisi->save();

        return redirect('admin/get-disposisi')
            ->withSuccess(sprintf('Surat berhasil dimasukkan'));
    }

}
