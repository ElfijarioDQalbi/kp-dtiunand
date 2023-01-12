<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\MahasiswaExportSelect;

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
        return view('admin.mahasiswa', ['mhs' => $mhs->paginate(5)]);

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

        // $this->validate($request, [
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
        //     'semester' => 'required'
        // ], [
        //     'nama.required' => 'Masukkan Nama Mahasiswa',
        //     'nim.required' => 'Masukkan NIM Mahasiswa ',
        //     'prodi.required' => 'Masukkan Program Studi ',
        //     'fakultas.required' => 'Masukkan Fakultas ',
        //     'angkatan.required' => 'Masukkan Angkatan ',
        //     'nohp_mhs.required' => 'Masukkan Nomor Mahasiswa',
        //     'nohp_ortu.required' => 'Masukkan Nomor Orang tua/ Wali',
        //     'email.required' => 'Masukan email Mahasiswa yang aktif',
        //     'ipk.required' => 'Masukkan IPK mahasiswa',
        //     'total_sks.required' => 'Masukkan total SKS Mahasiswa yang telah diambil',
        //     'masa_studi.required' => 'Masukkan Masa Studi Mahasiswa',
        //     'status.required' => 'Masukkan Status Mahasiswa',
        //     'evaluasi.required' => 'Masukkan hasil Evaluasi Mahasiswa ',
        //     'semester.required' => 'Masukkan Semester Mahasiswa'
        // ]);

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
        //
        // $mahasiswa = Mahasiswa::findOrfail($id);
        // $mahasiswa->delete();
        // return redirect()->route('/admin/mahasiswa')->with('success','Data Mahasiswa Berhasil di Hapus');
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
        $file_excel = $request->file('excel_file');

        $nama_file = $file_excel->getClientOriginalName();
        $file_excel->move('MahasiswaData', $nama_file);

        Excel::import(new MahasiswaImport, public_path('/MahasiswaData/' . $nama_file));
        //return redirect('/mahasiswa')->with('success-i', 'Data Berhasil Ditambahkan');
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
}
