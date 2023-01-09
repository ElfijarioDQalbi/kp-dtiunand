<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\WablasTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Exports\MahasiswaExport;
use App\Exports\MahasiswaExportFakultas;
use App\Exports\MahasiswaExportSelect;
use Maatwebsite\Excel\Facades\Excel;


class FormController extends Controller
{
    // public function __construct(){
    //     $this->Mahasiswa = new Mahasiswa();
    // }

    public function index(Request $request)
    {
        // return $request->all();

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
        return view('admin.pesan', ['mhs' => $mhs->paginate(10)]);

        // if($request){
        //     $mhs = Mahasiswa::where('angkatan', 'LIKE', '%' .$request->search. '%')->get();      
        // }else{
        //     $mhs = Mahasiswa::all();
        // }
        // return view('admin.pesan', compact('mhs', 'request'));

    }

    public function store()
    {
        $mhs = Mahasiswa::query();

        dd(request("ids[{{ $mhsiswa->id }}]"));
        // $request->validate([
        //     // 'email' => 'required|email',
        //     //'subject' => 'required',
        //     'name' => 'required',
        //     'content' => 'required',
        //   ]);

        // $mahasiswa =DB::select('select * from mahasiswas');
        // $kumpulan_data = [];
        // foreach ($mahasiswa as $nilai) {
        // //$data['phone'] = request('no_wa'); meminta nilai yang ada didalam form yang disediakan
        // $mhs['phone'] = $nilai->hp_mahasiswa ;
        // $mhs['message'] = request('pesan');
        // $mhs['secret'] = false;
        // $mhs['retry'] = false;
        // $mhs['isGroup'] = false;
        // array_push($kumpulan_data, $mhs);
        // }
        // WablasTrait::sendText($kumpulan_data);

        // return redirect()->back()->with(['message' => 'Email successfully sent!']);
    }

    public function export(Request $request)
    {
        $ids = $request->ids;
        // print_r($ids);
        return (new MahasiswaExportSelect($ids))->download('Mahasiswa1.xlsx');
    }

    // public function export(Request $request){
    //     $ids = $request->ids;
    //     $data = Mahasiswa::whereIn('id', $ids);
    //     return Excel::download(new MahasiswaExportSelect, 'daftarmahasiswaselect.xlsx');
    // }

}
