<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index(){
        $mahasiswa = mahasiswa::all();
        return view('admin/data', compact("mahasiswa") );
    }
    
    public function exportexcel()
    {
        return Excel::download(new MahasiswaExport, "mahasiswa DO.xlsx");
    }

    public function import() 
    {
        Excel::import(new MahasiswaImport, 'mahasiswa DO.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
}
