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
        if($row['semester'] == 3){
            if(($row['ipk'] <= 2.00) || ($row['total_sks'] < 40) ){
                $evaluasi = 'terancam do';
            }else{
                $evaluasi = 'aman';
            }
        }else if ($row['semester'] == 13){
            if(($row['ipk'] <= 2.00) || ($row['total_sks'] < 144) ){
                $evaluasi = 'terancam do';
            }else{
                $evaluasi = 'aman';
            }
        }else{
            $evaluasi = 'aman';
        }

        if(($row['semester'] == 3)){
            $masa_studi = "1.5";
        } else if (($row['semester'] == 13)) {
            $masa_studi = "6.5";
        }
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
            'masa_studi' => $masa_studi,
            'hp_ortu' => $row['hp_ortu'],
            'hp_mahasiswa' => $row['hp_mahasiswa'],
            'email' => $row['email'],
            'status' => $row['status'],
            'evaluasi' => $evaluasi,
        ]);

        //dd($row);
    }
}
