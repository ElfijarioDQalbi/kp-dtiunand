<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\MahasiswaExportFakultas;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;

class MahasiswaController extends Controller
{
    public $fakultas;
    public function tampilcreate()
    {
        return view('admin/tambahmahasiswa');
    }

    public function insertmahasiswa(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/data');
    }

    public function tampilkanMahasiswa(Request $request)
    {
        $request->validate([
            'angkatan' => 'required',
            'fakultas' => 'required',
        ]);

        $this->fakultas = $request["fakultas"];
        //$data= DB::select('select * from users where active = ?', [1])
        //$data = DB::select('select * from mahasiswas where angkatan = :angkatan and fakultas = :fakultas ', [$request['angkatan'], $request['fakultas']]);
        $data = Mahasiswa::where('angkatan', '=', $request['angkatan'])->where('fakultas', '=', $request['fakultas'])->get();
        // dd($data);
        return view('/admin/tampilkanmahasiswa', compact('data'));
    }

    public function exportExcelFakultas(Request $request)
    {

        $request->validate([
            'angkatan' => 'required',
            'fakultas' => 'required',
        ]);
        //$namafile = "Fakultas " + $request['fakultas'] + ".xlsx";
        //dd($request['angkatan']);
        
        return Excel::download(new MahasiswaExportFakultas($request['angkatan']),"mahasiswa DO.xlsx", ExcelExcel::XLSX);
    }
}
