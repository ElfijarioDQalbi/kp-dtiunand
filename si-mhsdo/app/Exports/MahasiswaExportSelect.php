<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class MahasiswaExportSelect implements FromQuery, WithHeadings
{

    use Exportable;



    use Exportable;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        //$this->ids = implode(',', $this->ids);

        return Mahasiswa::query()->whereIn('id', $this->ids);
        //var_dump($this->ids);
    }


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
    //     public function sheets(): array
    //     {
    //         $sheets = [];


    //         return $sheets;
    //     }
}
