<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RootJabatanController extends Controller
{
    Public function GetRootJabatan()
    {
        $rootjab = DB::table('rootjabatans')
                ->get() ;
        return view('admin/rootjabatan',['rootjab'=>$rootjab]);
    }
}
