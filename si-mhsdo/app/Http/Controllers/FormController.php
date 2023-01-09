<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\WablasTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;


class FormController extends Controller
{
    public function index()
    {
        // $curl = curl_init();
        // $token = "qXSgPtFMGGCxnpc3xEz110Rwnwfac1B9d4Z7MRFzouO343nRyGf1nui6MPsJGLYz";
        // curl_setopt($curl, CURLOPT_URL, "https://jogja.wablas.com/api/device/info?token=$token");
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        // $result = curl_exec($curl);
        // curl_close($curl);
        // $api = json_decode($result, true);

        // if ($api['data']['status'] = 'disconnect') {
        //     //return view('admin/apiwa', compact('api'));
        //     dd($api);
        // } else {
        $data = mahasiswa::all();
        return view('/admin/pesan', compact('data'));
        //}
    }

    public function store()
    {
        $mahasiswa = DB::select('select * from mahasiswas');
        $kumpulan_data = [];
        foreach ($mahasiswa as $nilai) {
            //$data['phone'] = request('no_wa'); meminta nilai yang ada didalam form yang disediakan
            $data['phone'] = $nilai->hp_mahasiswa;
            $data['message'] = request('pesan');
            $data['secret'] = false;
            $data['retry'] = false;
            $data['isGroup'] = false;
            array_push($kumpulan_data, $data);
        }
        WablasTrait::sendText($kumpulan_data);

        return redirect()->back()->with(['message' => 'Pesan Whatsapp Berhasil dikirim!']);
    }
    public function riwayatPesan()
    {
        return WablasTrait::infoRealtime();

        //return redirect()->back()->with(['message' => 'Pesan Whatsapp Berhasil dikirim!']);
    }

    public function infoRiwayat(Request $request)
    {
        if ($request->has('date')) {
            $date = $request->date;
        }
        return WablasTrait::infoRiwayat($request->date);


        //return redirect()->back()->with(['message' => 'Pesan Whatsapp Berhasil dikirim!']);
    }
}
