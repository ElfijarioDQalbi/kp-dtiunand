<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            //
            'nama' => $row[1],
            'nim' => $row[2],
            'angkatan' => $row[3],
            'prodi' => $row[4],
            'fakultas' => $row[5],
            'semester' => $row[6],
            'ipk' => $row[7],
            'total_sks' => $row[8],
            'masa_studi' => $row[9],
            'hp_ortu' => $row[10],
            'hp_mahasiswa' => $row[11],
            'email' => $row[12],
            'status' => $row[13],
            'evaluasi' => $row[14],
        ]); 
    }
}
