<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MahasiswaExportSelect implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'No',
            'Nama_Mahasiswa',
            'NIM',
            'Tahun_Angkatan',
            'Program_studi',
            'Fakultas',
            'Semester',
            'IPK',
            'Total_SKS',
            'Masa_Studi',
            'NoHP_Ortu',
            'NoHP_Mahasiswa',
            'Email',
            'Status',
            'Evaluasi',
        ];
    }

    public function collection()
    {

        return Mahasiswa::all();
    }

    // use Exportable;

    // public function __construct(int $ids)
    // {
    //     $this->ids = $ids;
    // }

    // public function query()
    // {
    //     return Mahasiswa::query()->whereids('fakultas', $this->ids);
    // }

    // public function sheets(): array
    // {
    //     $sheets = [];


    //     return $sheets;
    // }
}
