<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\WablasTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;


class FormController extends Controller
{
    public function __construct(){
        $this->Mahasiswa = new Mahasiswa();
    }
    
    public function index()
    {
        $data =[
            'mahasiswa' => $this->Mahasiswa->allData(),];
        return view('/admin/pesan', $data);
    }
    
    public function store()
    {
        $mahasiswa =DB::select('select * from mahasiswa');
        $kumpulan_data = [];
        foreach ($mahasiswa as $nilai) {
        //$data['phone'] = request('no_wa'); meminta nilai yang ada didalam form yang disediakan
        $data['phone'] = $nilai->hp_mahasiswa ;
        $data['message'] = request('pesan');
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($kumpulan_data, $data);
        }
        WablasTrait::sendText($kumpulan_data);
        
        return redirect()->back()->with(['message' => 'Email successfully sent!']);
    }
}
