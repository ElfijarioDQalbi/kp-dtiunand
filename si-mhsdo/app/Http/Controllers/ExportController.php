<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Exports\MahasiswaExportFakultas;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return view('admin/data', compact("mahasiswa"));
    }

    public function exportexcel()
    {
        return Excel::download(new MahasiswaExport, "mahasiswa DO.xlsx");
    }

    public function exportExcelFakultas(Request $request)
    {

        $request->validate([
            'angkatan' => 'required',
            'fakultas' => 'required',
        ]);

        return Excel::download(new MahasiswaExportFakultas($request['angkatan'], $request['fakultas'], "mahasiswa DO.xlsx"));
    }
}
