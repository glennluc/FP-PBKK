<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __construct(Jabatan $jabatan, User $user)
    {
        $this->jabatan = $jabatan;
        $this->user = $user;
    }
    
    public function index()
    {
        $jabatan = $this->jabatan::all();
        return view('login', ['jabatan' => $jabatan]);
    }

    public function addSession (Request $request) {
        return $request->session ()->has ('name');
    }

    public function login(Request $request)
    {
        $user = $this->user->where('nik',$request->nik)->first();
        if(md5($request->password)==$user->password && $request->id_jabatan==$user->id_jabatans ){
            
            Session::put('userSession', $user);
            
            date_default_timezone_set('Asia/Jakarta');
            $mytime =  date('Y-m-d H:i:s');
            
            DB::table('users')
                ->where('id_user', $user->id_user)
                ->update(['last_login' => $mytime]);
            
            if ($user->authority == "admin" || $user->authority == 'sekretaris')
            {
                $current_login = $user->name;
                $cur_id = $user->id_user;
                \Illuminate\Support\Facades\Session::put('auth',$user->authority);
                Session::put('clog',$current_login);
                Session::put('clogid',$cur_id);
                return redirect('admin/dashboard');
            }
            elseif ($user->authority == "user" )
            {
                $current_login = $user->name;
                $cur_id = $user->id_user;
                \Illuminate\Support\Facades\Session::put('auth',$user->authority);
                Session::put('clog',$current_login);
                Session::put('clogid',$cur_id);
                return redirect('admin/get-surat');
            }
            
        }

    }

    public function logout(Request $request)
    {
        $request->session ()->forget ('userSession');

        return redirect('/login');
    }

    
}
