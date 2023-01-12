<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// HeadingRowFormatter::default('none');

class MahasiswaImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     * 
     * 
     */



    public function model(array $row)
    {
        return new Mahasiswa([
            //
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'angkatan' => $row['angkatan'],
            'prodi' => $row['prodi'],
            'fakultas' => $row['fakultas'],
            'semester' => $row['semester'],
            'ipk' => $row['ipk'],
            'total_sks' => $row['total_sks'],
            'masa_studi' => $row['masa_studi'],
            'hp_ortu' => $row['hp_ortu'],
            'hp_mahasiswa' => $row['hp_mahasiswa'],
            'email' => $row['email'],
            'status' => $row['status'],
            'evaluasi' => $row['evaluasi'],
        ]);
        // dd($row);
    }
}
