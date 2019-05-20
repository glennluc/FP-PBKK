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
        if ($sampaiTanggal == null) {
            $sampaiTanggal = date('Y-m-d');
        }

        $debug = 0;
//        dd($dariTanggal,$sampaiTanggal,$tipeSurat, date('Y-m-d'));

//        dd(is_null($dariTanggal),is_null($sampaiTanggal),is_null($tipeSurat));


//        $sampaiTanggal = date('Y-m-d');
//        dd($dariTanggal,$sampaiTanggal,$tipeSurat);

        if ($dariTanggal == null && $sampaiTanggal != null && $tipeSurat != null) {
            $debug = 1;
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();
        } elseif ($dariTanggal != null && $sampaiTanggal == null && $tipeSurat != null) {
            $debug = 2;
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();
        } elseif ($dariTanggal != null && $sampaiTanggal != null && $tipeSurat == null) {
            $debug = 3;
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->get();
        } elseif ($dariTanggal == null && $sampaiTanggal == null && $tipeSurat == null) {
            $debug = 4;
//            echo "sampai sini";
            $surat = DB::table('surats')
                ->get();
        } elseif ($dariTanggal == null && $sampaiTanggal == null && $tipeSurat != null) {
            $debug = 5;
            $surat = DB::table('surats')
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();
        } elseif ($dariTanggal == null && $sampaiTanggal != null && $tipeSurat == null) {
            $debug = 6;
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->get();
        } elseif ($dariTanggal != null && $sampaiTanggal == null && $tipeSurat == null) {
            $debug = 7;
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->get();
        } elseif ($dariTanggal != null && $sampaiTanggal != null && $tipeSurat != null) {
            $debug = 8;
            $surat = DB::table('surats')
                ->whereDate('tanggal_surat', '>=', $dariTanggal)
                ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                ->where('tipe_surat', "=", $tipeSurat)
                ->get();
        }else{
            $debug = 9;
            dd("GAMASUK SEMUANYA",$dariTanggal,$sampaiTanggal,$tipeSurat);
        }

        switch ($request->input('excel')) {
            case 'display':
                return view('laporan/laporan', compact('dariTanggal', 'sampaiTanggal', 'tipeSurat', 'surat'));
                break;

            case 'export':
                if($dariTanggal == null){
                    $filename = "Laporan Surat " . $tipeSurat . " Hingga Tanggal " . $sampaiTanggal . " .xlsx";
                }else{
                    $filename = "Laporan Surat " . $tipeSurat . " Tanggal " . $dariTanggal . " Sampai " . $sampaiTanggal . " .xlsx";
                }

                $export = app()->makeWith(LaporanExport::class, compact('dariTanggal', 'sampaiTanggal', 'tipeSurat'));
                return $export->download($filename);
                break;
        }
    }
}
