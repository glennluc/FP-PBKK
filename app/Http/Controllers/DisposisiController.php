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
                ->get() ;
        $surat = Surat::all(); 
        return view('disposisi/disposisi', compact('disposisi', 'surat'));
    }

    Public function showCreateDisposisi()
    {   
        $surat = Surat::all(); 
        return view('disposisi/create_disposisi', compact('surat'));
    }

    Public function CreateDisposisi(Request $request)
    {

        $ltime = date('Y-m-d H:i:s');
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

        return redirect('admin/get-disposisi')
            ->withSuccess(sprintf('Surat berhasil dimasukkan'));
    }

    Public function showEditDisposisi($id)
    {
        $disposisi = DB::table('disposisi_surats')
                ->join('surats', 'disposisi_surats.id_surats', '=', 'surats.id_surat')
                ->get() ;
        $surat = Surat::all(); 
        return view('disposisi/edit_disposisi', compact('disposisi', 'surat'));
    }

}
