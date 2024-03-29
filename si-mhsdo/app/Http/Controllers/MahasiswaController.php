<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MahasiswaExportSelect;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(){
    //     $this->Mahasiswa = new Mahasiswa();
    // }

    public function index(Request $request)
    {
        $mhs = Mahasiswa::query();
        //filter angkatan
        $mhs->when($request->aktn, function ($query) use ($request) {
            return $query->where('angkatan', 'like', '%' . $request->aktn . '%');
        });
        //filter semester
        $mhs->when($request->smester, function ($query) use ($request) {
            return $query->whereSemester($request->smester);
        });
        //filter fakultas
        $mhs->when($request->fkltas, function ($query) use ($request) {
            return $query->whereFakultas($request->fkltas);
        });
        //filter status evaluasi
        $mhs->when($request->eval, function ($query) use ($request) {
            return $query->whereEvaluasi($request->eval);
                    
        });
                  
        return view('admin.mahasiswa', ['mhs' => $mhs->paginate(10)]);

        // $mhs = Mahasiswa::paginate(4);
        // return view('admin.mahasiswa' , compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createmhs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->semester == 3){
            if(($request->ipk <= 2.00) || ($request->total_sks < 40) ){
                $evaluasi = 'terancam do';
            }else{
                $evaluasi = 'aman';
            }
        }else if ($request->semester == 13){
            if(($request->ipk <= 2.00) || ($request->total_sks < 144) ){
                $evaluasi = 'terancam do';
            }else{
                $evaluasi = 'aman';
            }
        }else{
            $evaluasi = 'aman';
        }
        $request['evaluasi'] = $evaluasi;

        if(($request->semester == 3)){
            $masastudi = "1.5";
        } else if (($request->semester == 13)) {
            $masastudi = "6.5";
        }
        $request['masa_studi'] = $masastudi;

        // $request->validate([
        //     'nama' => 'required',
        //     'nim' => 'required',
        //     'prodi' => 'required',
        //     'fakultas' => 'required',
        //     'angkatan' => 'required',
        //     'nohp_mhs' => 'required',
        //     'nohp_ortu' => 'required',
        //     'email' => 'required',
        //     'ipk' => 'required',
        //     'total_sks' => 'required',
        //     'masa_studi' => 'required',
        //     'status' => 'required',
        //     'evaluasi' => 'required',
        //     'semester' => 'required',
        // ]);
        $this->validate($request,[
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
            'angkatan' => 'required',
            'hp_mahasiswa' => 'required',
            'hp_ortu' => 'required',
            'email' => 'required',
            'ipk' => 'required',
            'total_sks' => 'required',
            'status' => 'required',
            'semester' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('success-i', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mhs, $id)
    {
        $mhs = Mahasiswa::findOrfail($id);
        return view('admin.detailmhs', compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mhs, $id)
    {
        $mhs = Mahasiswa::findOrfail($id);
        return view('admin.editmhs', compact('mhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mhs, $id)
    {

        $mhs = Mahasiswa::findOrfail($id);
        if($request->semester == 3){
            if(($request->ipk <= 2.00) || ($request->total_sks < 40) ){
                $evaluasi = 'terancam do';
            }else{
                $evaluasi = 'aman';
            }
        }else if ($request->semester == 13){
            if(($request->ipk <= 2.00) || ($request->total_sks < 144) ){
                $evaluasi = 'terancam do';
            }else{
                $evaluasi = 'aman';
            }
        }else{
            $evaluasi = 'aman';
        }
        $request['evaluasi'] = $evaluasi;

        if(($request->semester == 3)){
            $masastudi = "1.5";
        } else if (($request->semester == 13)) {
            $masastudi = "6.5";
        }
        $request['masa_studi'] = $masastudi;

        $this->validate($request,[
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
            'angkatan' => 'required',
            'hp_mahasiswa' => 'required',
            'hp_ortu' => 'required',
            'email' => 'required',
            'ipk' => 'required',
            'total_sks' => 'required',
            'status' => 'required',
            'semester' => 'required',
        ]);

        $mhs->update($request->all());
        return redirect('/mahasiswa')->with('success-e', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa, $id)
    {
        $mhs = Mahasiswa::findOrfail($id);
        $mhs->delete();
        return redirect('/mahasiswa')->with('success-d', 'Data Berhasil Dihapuskan');
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'daftarmahasiswa.xlsx');
    }

    public function import(Request $request)
    {
        // try {
            $file_excel = $request->file('excel_file');

            $nama_file = $file_excel->getClientOriginalName();
            $file_excel->move('MahasiswaData', $nama_file);

            Excel::import(new MahasiswaImport, public_path('/MahasiswaData/' . $nama_file));
            return redirect('/mahasiswa')->with('success-i', 'Data Berhasil Ditambahkan');
        // } catch (Throwable $e) {
        //     return redirect('/mahasiswa')->with('success-d', 'data yang dimasukkan salah, harap perhatikan kembali file yang telah diupload');
        // }
    }

    public function exportselected(Request $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ], ['ids.required' => 'Wajib memilih bagian yang akan di Export']);
        $ids = $request->ids;
        // print_r($ids);
        return (new MahasiswaExportSelect($ids))->download('Mahasiswa1.xlsx');
    }

    public function dashboard()
    {
        $jlhmhs_smstr3 = Mahasiswa::where('semester', '3')->where('evaluasi','terancam do')->count();
        $jlhmhs_smstr13 = Mahasiswa::where('semester', '13')->where('evaluasi','terancam do')->count();

        $total_mhsdo_perfakultas = Mahasiswa::select(DB::raw("CAST(COUNT(semester) as int) as jlhmhsdo"))
            ->where('evaluasi','terancam do')
            ->GroupBy(DB::raw("(fakultas)"))
            ->pluck('jlhmhsdo');

        $total_mhsdo_smstr3 = Mahasiswa::select(DB::raw("CAST(COUNT(semester) as int) as jlhmhsdo3"))
            ->where('semester', '3')
            ->where('evaluasi','terancam do')
            ->GroupBy(DB::raw("(fakultas)"))
            ->pluck('jlhmhsdo3');

        $total_mhsdo_smstr13 = Mahasiswa::select(DB::raw("CAST(COUNT(semester) as int) as jlhmhsdo13"))
            ->where('semester', '13')
            ->where('evaluasi','terancam do')
            ->GroupBy(DB::raw("(fakultas)"))
            ->pluck('jlhmhsdo13');

        $fakultas = Mahasiswa::select(DB::raw("(fakultas) as fakultas"))
            ->where('evaluasi','terancam do')
            ->GroupBy(DB::raw("(fakultas)"))
            ->pluck('fakultas');

        $fakultas3 = Mahasiswa::select(DB::raw("(fakultas) as fakultas"))
            ->where('semester', '3')
            ->where('evaluasi','terancam do')
            ->GroupBy(DB::raw("(fakultas)"))
            ->pluck('fakultas');

        $fakultas13 = Mahasiswa::select(DB::raw("(fakultas) as fakultas"))
            ->where('semester', '13')
            ->where('evaluasi','terancam do')
            ->GroupBy(DB::raw("(fakultas)"))
            ->pluck('fakultas');

        return view('admin/beranda', compact(
            'jlhmhs_smstr3',
            'jlhmhs_smstr13',
            'fakultas',
            'total_mhsdo_perfakultas',
            'total_mhsdo_smstr3',
            'total_mhsdo_smstr13',
            'fakultas3',
            'fakultas13'
        ));
    }
}
