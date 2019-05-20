<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RootJabatan;

class RootJabatanController extends Controller
{
    Public function GetRootJabatan()
    {
        $rootjab = DB::table('rootjabatans')
                ->get() ;
        return view('rootjabatan/rootjabatan',['rootjab'=>$rootjab]);
    }

    Public function showCreateRootJabatan()
    {
        return view('rootjabatan/create_rootjabatan');
    }

    Public function CreateRootJabatan(Request $request)
    {
        $rootjabatan = new RootJabatan;

        
        $rootjabatan->root_jab = $request->root_jab;

        $rootjabatan->save();

        return redirect('admin/get-rootjab');
    }

    public function DeleteRootJabatan($id)
    {
        $rootjabatan = DB::table('rootjabatans')->where('id_rootJab', $id)->delete();
        return redirect('admin/get-rootjab');
    }

    Public function showEditRootJabatan($id)
    {
        $rootjabatan = DB::table('rootjabatans')
            ->where('id_rootJab', $id)
            ->get();
        return view('rootjabatan/edit_rootjabatan',['rootjabatan' => $rootjabatan]);
    }

    Public function UpdateRootJabatan(Request $request)
    {
        $rootjabatan = array(
            'root_jab' => $request->root_jab,
            'id_rootJab' => $request->id_rootJab
        );
        
        DB::table('rootjabatans')
            ->where('id_rootJab', $request->id_rootJab)
            ->update($rootjabatan);

        return redirect('admin/get-rootjab');
    }
}
