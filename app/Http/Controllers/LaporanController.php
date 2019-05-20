<?php

namespace App\Http\Controllers;

use App\User;
use App\Jabatan;
use App\Bagian;
use App\RootJabatan;
use App\Surat;
use App\Disposisi;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    Public function GetLaporan()
    {
        $surat = DB::table('surats')
            ->get();
        return view('laporan/laporan', ['surat' => $surat]);
    }

    Public function showLaporan(Request $request)
    {
        $dariTanggal = $request->dariTanggal;
        $sampaiTanggal = $request->sampaiTanggal;
        $tipeSurat = $request->tipeSurat;

        $sampaiTanggal = date('Y-m-d');

        if ($dariTanggal = null && $sampaiTanggal != null && $tipeSurat != null)
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();
        elseif ($dariTanggal != null && $sampaiTanggal = null && $tipeSurat != null)
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();
        elseif ($dariTanggal != null && $sampaiTanggal != null && $tipeSurat = null)
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->get();
        elseif ($dariTanggal = null && $sampaiTanggal = null && $tipeSurat = null)
            $surat = DB::table('surats')
                ->get();
        else
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();

        return view('laporan/laporan', compact('dariTanggal', 'sampaiTanggal', 'tipeSurat', 'surat'));
    }

    public function ExportLaporan()
    {
        return Excel::download(new LaporanExport, 'Laporan.xlsx');
    }


}
