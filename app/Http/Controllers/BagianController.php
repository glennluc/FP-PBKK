<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    Public function GetBagian()
    {
        $bagian = DB::table('bagians')
                ->get() ;
        return view('admin/bagian',['bagian'=>$bagian]);
    }

    Public function showCreateBagian()
    {    
        return view('admin/create_bagian');
    }

    Public function CreateBagian(Request $request)
    {
        $user = new User;

        $user->kode_bagian = $request->kode_bagian;
        $user->nama_bagian = $request->nama_bagian;
        $user->keterangan = $request->keterangan;

        $user->save();

        return redirect('admin/get_bagian');
    }


    
}
