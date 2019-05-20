<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bagian;

class BagianController extends Controller
{
    Public function GetBagian()
    {
        $bagian = DB::table('bagians')
            ->get();
        return view('bagian/bagian', ['bagian' => $bagian]);
    }

    Public function showCreateBagian()
    {
        return view('bagian/create_bagian');
    }

    Public function CreateBagian(Request $request)
    {
        $bagian = new Bagian;

        $bagian->kode_bagian = $request->kode_bagian;
        $bagian->nama_bagian = $request->nama_bagian;
        $bagian->keterangan = $request->keterangan;

        $bagian->save();

        return redirect('bagian/get-bagian');
    }

    public function DeleteBagian($id)
    {
        $bagian = DB::table('bagians')->where('id_bagian', $id)->delete();
        return redirect('bagian/get-bagian');
    }

    Public function showEditBagian($id)
    {
        $bagian = DB::table('bagians')
            ->where('id_bagian', $id)
            ->get();
        return view('bagian/edit_bagian', compact('bagian'));
    }

    Public function UpdateBagian(Request $request)
    {
        $bagian = array(
            'kode_bagian' => $request->kode_bagian,
            'nama_bagian' => $request->nama_bagian,
            'keterangan' => $request->keterangan
        );

        DB::table('bagians')
            ->where('id_bagian', $request->id)
            ->update($bagian);

        return redirect('bagian/get-bagian');
    }

}
