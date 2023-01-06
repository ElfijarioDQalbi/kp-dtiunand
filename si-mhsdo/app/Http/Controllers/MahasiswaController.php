<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
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
    
    public function index()
    {
        //
        // $mahasiswa = ['mahasiswa' => $this->Mahasiswa->allData()];

        $mhs = Mahasiswa::paginate(4);
        return view('admin.mahasiswa' , compact('mhs'));
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
        //
        // $request->validate([
        //     'nama_mhs' => 'required',
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
        //     'semester' => 'required'
        // ]);
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('success-i','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mhs, $id)
    {
        //
        // $mahasiswa = Mahasiswa::findOrfail($id);
        // return view('mhs.show',compact('mahasiswa'));
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
        //
        // $mahasiswa = Mahasiswa::findOrfail($id);
        // return view('/mahasiswa/editmhs', compact('mahasiswa'));
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
        //
        // $request->validate([
        //     'nama_mhs' => 'required',
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
        //     'semester' => 'required'
        // ]);

        // $mahasiswa->update($request->all());

        // return redirect()->route('/admin/mahasiswa')->with('success','Mahasiswa Berhasil di Update');
        $mhs = Mahasiswa::findOrfail($id);
        $mhs->update($request->all());
        return redirect('/mahasiswa')->with('success-e','Data Berhasil Diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa, $id)
    {
        //
        // $mahasiswa = Mahasiswa::findOrfail($id);
        // $mahasiswa->delete();
        // return redirect()->route('/admin/mahasiswa')->with('success','Data Mahasiswa Berhasil di Hapus');
        $mhs = Mahasiswa::findOrfail($id);
        $mhs->delete();
        return redirect('/mahasiswa')->with('success-d','Data Berhasil Dihapuskan');
    }

    public function export(){
        return Excel::download(new MahasiswaExport, 'daftarmahasiswa.xlsx');
    }

    public function import(Request $request){
        $file_excel = $request->file('excel_file');

        $nama_file = $file_excel->getClientOriginalName();
        $file_excel->move('MahasiswaData', $nama_file);

        Excel::import(new MahasiswaImport, public_path('/MahasiswaData/'.$nama_file));

        return redirect()->back(); 
    }
}
