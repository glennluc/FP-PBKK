<?php

namespace App\Exports;

use App\Surat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $tipe;
    protected $mulai;
    protected $sampai;

    public function __construct($dariTanggal, $sampaiTanggal, $tipeSurat)
    {
        $this->dariTanggal = $dariTanggal;
        $this->sampaiTanggal = $sampaiTanggal;
        $this->tipeSurat = $tipeSurat;
    }

    public function collection()
    {
        $surats = DB::table('surats')
            ->select('no_surat', 'dari', 'users.name',
                'tujuan_surat_keluar', 'perihal',
                'keterangan', 'status_surat', 'status_disposisi')
            ->join('users', 'surats.id_users', "=", 'users.id_user')
            ->where('tipe_surat', $this->tipeSurat)
            ->where('tanggal_entry', '>=', $this->dariTanggal)
            ->where('tanggal_entry', '<=', $this->sampaiTanggal)
            ->get();

        $no = 1;
        foreach ($surats as $surat) {
            $suratData[] = [
                'No' => $no++,
                'No_Surat' => $surat->no_surat,
                'Dari' => $surat->dari,
                'Entry' => $surat->name,
                'Untuk' => $surat->tujuan_surat_keluar,
                'Perihal' => $surat->perihal,
                'Keterangan' => $surat->keterangan,
                'Status_Surat' => $surat->status_surat,
                'Status_Disposisi' => $surat->status_disposisi,
            ];

        }
        // dd($suratData);
        return collect($suratData);
    }

    public function headings(): array
    {
        return [
            'No',
            'No Surat',
            'Dari',
            'Entry',
            'Untuk',
            'Perihal',
            'Keterangan',
            'Status Surat',
            'Status Disposisi',
        ];
    }
}
