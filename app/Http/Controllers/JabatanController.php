<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jabatan;
use App\RootJabatan;
use App\Bagian;

class JabatanController extends Controller
{
    Public function GetJabatan()
    {
        $jabatan = DB::table('jabatans')
            ->get();
        return view('jabatan/jabatan', ['jabatan' => $jabatan]);
    }

    Public function showCreateJabatan()
    {
        $jabatan = Jabatan::all();
        $bagian = Bagian::all();
        $rootjabatan = RootJabatan::all();
//        dd($jabatan,$bagian,$rootjabatan);

        return view('jabatan/create_jabatan', compact('jabatan', 'bagian', 'rootjabatan'));
    }

    Public function CreateJabatan(Request $request)
    {
        $jabatan = new Jabatan;

//        $exploded_value = explode('|', $request->id_rootJabs);
//        $id_rootJab = $exploded_value[0];
//        $root_Jab = $exploded_value[1];

        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->id_bagians = $request->id_bagian;
        $jabatan->level = $request->level;
        // $jabatan->parent_jabatan = $request->parent_jabatan;
        $jabatan->id_rootJabs = $request->id_rootJabs;

        $list_jabatan = DB::table('rootjabatans')
            ->where('id_rootJab', '=', $jabatan->id_rootJabs)
            ->first();

        $jabatan->parent_jabatan = $list_jabatan->root_jab;
        $jabatan->keterangan = $request->keterangan;

        $jabatan->save();

        return redirect('admin/get-jabatan');
    }

    Public function showEditJabatan($id)
    {
        $jabatan = DB::table('jabatans')
            ->where('id_jabatan', $id)
            ->join('bagians', 'jabatans.id_bagians', '=', 'bagians.id_bagian')
            ->select('jabatans.*', 'bagians.nama_bagian')
            ->first();
        $bagian = Bagian::all();
        $rootjabatan = RootJabatan::all();

        return view('jabatan/edit_jabatan', compact('jabatan', 'bagian', 'rootjabatan'));
    }

    Public function UpdateJabatan(Request $request)
    {
        $jabatans = Jabatan::all();
        $jabatans->id_rootJabs = $request->id_rootJabs;
        $list_jabatan = DB::table('rootjabatans')
            ->where('id_rootJab', '=', $jabatans->id_rootJabs)
            ->first();
        $list_jabatan->root_jab;


        $jabatan = array(
            'nama_jabatan' => $request->nama_jabatan,
            'id_bagians' => $request->id_bagian,
            'level' => $request->level,
            'id_rootJabs' => $request->id_rootJabs,
            'keterangan' => $request->keterangan,
            'id_jabatan' => $request->id_jabatan,
            'parent_jabatan' => $list_jabatan->root_jab
        );

        DB::table('jabatans')
            ->where('id_jabatan', $request->id_jabatan)
            ->update($jabatan);

        return redirect('admin/get-jabatan');
    }
}
