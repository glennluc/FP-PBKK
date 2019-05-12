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
    
}
