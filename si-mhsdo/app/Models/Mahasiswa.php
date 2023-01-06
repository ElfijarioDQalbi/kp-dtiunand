<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'nim', 
        'angkatan', 
        'prodi', 
        'fakultas', 
        'semester', 
        'ipk', 
        'total_sks', 
        'masa_studi', 
        'hp_ortu', 
        'hp_mahasiswa', 
        'email', 
        'status', 
        'evaluasi'];
    public $timestamps = false;

    // public static function getAllMahasiswa(){
    //     $ids = $request->ids;
    //     $result = DB::table('mahasiswas')
    //     -> select('nama', 'nim', 'angkatan', 'prodi', 'fakultas', 'semester', 'ipk', 'total_sks', 'masa_studi', 'hp_ortu', 'hp_mahasiswa', 'email', 'status', 'evaluasi')
    //     -> get($ids);
    // }
}
