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
                ->get() ;
        return view('admin/bagian',['bagian'=>$bagian]);
    }

    Public function showCreateBagian()
    {    
        return view('admin/create_bagian');
    }

    Public function CreateBagian(Request $request)
    {
        $bagian = new Bagian;

        $bagian->kode_bagian = $request->kode_bagian;
        $bagian->nama_bagian = $request->nama_bagian;
        $bagian->keterangan = $request->keterangan;

        $bagian->save();

        return redirect('admin/get-bagian');
    }

    public function DeleteBagian($id)
    {
    	$bagian = DB::table('bagians')->where('id_bagian', $id)->delete();
        return redirect('admin/get-bagian');
    }

    Public function showEditBagian($id)
    {
    	$bagian = DB::table('bagians')
                ->where('id_bagian',$id)->get() ;
        return view('admin/edit_bagian', compact('bagian'));
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

        return redirect('admin/get-bagian');
    }


    
}
