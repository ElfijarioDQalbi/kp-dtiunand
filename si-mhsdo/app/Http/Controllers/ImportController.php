<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{


    public function index()
    {

        return view('admin/import');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('dataMahasiswaImport', $namafile);
        Excel::import(new MahasiswaImport, public_path('/dataMahasiswaImport/'.$namafile));
        return redirect()->back();
    }
}
