<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard');
    }
    
}
