<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Vbayar;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vbayar::all();
    }

    public function headings(): array
    {
        return [
            'ID Pembayaran',
            'ID Petugas',
            'NISN',
            'Tanggal Bayar',
            'Bulan Bayar',            
            'Tahun Bayar',
            'ID SPP',
            'Jumlah Bayar',
            'Tanggal Bayar',
            'Tanggal Edit',
            'NIS',
            'Nama Siswa',
            'ID Kelas',
            'Nama Kelas',
            'Kompetensi Keahlian',
            'Tahun SPP',
            'Nominal SPP',
            'Nama Petugas',
        ];
    }
}
