<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function tampilcreate(){
        return view('admin/tambahmahasiswa');
    }
    
    public function insertmahasiswa(Request $request){
        Mahasiswa::create($request->all());
        return redirect('/data');
    }


}
