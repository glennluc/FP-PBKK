<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    Public function GetJabatan()
    {
        $jabatan = DB::table('jabatans')
                ->get() ;
        return view('admin/jabatan',['jabatan'=>$jabatan]);
    }
}
