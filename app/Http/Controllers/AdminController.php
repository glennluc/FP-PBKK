<?php

namespace App\Http\Controllers;
use App\Surat;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = Surat::all();
        $user = User::all();

        return view('admin/dashboard', compact('surat','user'));
    }
    
}
