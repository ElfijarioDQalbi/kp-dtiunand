<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class MahasiswaExportFakultas implements FromQuery
{
    use Exportable;

    public function __construct($angkatan)
    {
        $this->angkatan = $angkatan;
        $this->fakultas = $fakultas;
        
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    
    public function query()
    {
        return Mahasiswa::query()->where('angkatan', '=', $this->angkatan);
    }
}
