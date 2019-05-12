<?php

namespace App\Http\Controllers;
use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function GetUser()
    {
        $user = DB::table('users')
                ->join('jabatans', 'id_jabatans', '=', 'jabatans.id_jabatan')
                ->select('users.*','jabatans.nama_jabatan')
                ->get() ;
        return view('admin/user',['user'=>$user]);
    }

    Public function showCreateUser()
    {
        $jabatan = Jabatan::all();
        $bagian = Bagian::all();
        $rootjabatan = RootJabatan::all();
        
        return view('admin/create_user', compact('jabatan', 'bagian', 'rootjabatan'));
    }

    Public function CreateUser(Request $request)
    {
        $user = new User;

        $user->username = $request->username;
        $user->nik = $request->nik;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal_lahir = $request->tgl_lahir;
        $user->handphone = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->id_jabatans = $request->id_jabatan;
        $user->id_bagians = $request->id_bagian;
        $user->id_rootJabs = $request->id_rootJab;
        $user->authority = $request->authority;

        $user->save();

        return redirect('admin/get-user');
    }

    Public function showCreateUser($id)
    {
        $user = DB::table('users')
                ->select('*')
                ->where('id_user',$id)
                ->get() ;
        $jabatan = Jabatan::all();
        $bagian = Bagian::all();
        $rootjabatan = RootJabatan::all();
        
        return view('admin/create_user', compact('jabatan', 'bagian', 'rootjabatan'));
    }
}
