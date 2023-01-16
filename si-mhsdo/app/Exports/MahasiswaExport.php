<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIM',
            'Angkatan',
            'Prodi',
            'Fakultas',
            'Semester',
            'IPK',
            'Total_SKS',
            'Masa_Studi',
            'HP_Ortu',
            'HP_Mahasiswa',
            'Email',
            'Status',
            'Evaluasi',
        ];
    }

    public function collection()
    {
        return Mahasiswa::all();
    }

    // public function sheets(): array
    // {
    //     $sheets = [];


    //     return $sheets;
    // }
}
