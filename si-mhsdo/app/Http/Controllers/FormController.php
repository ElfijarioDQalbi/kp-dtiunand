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
        $curl = curl_init();
        $token = env('SECURITY_TOKEN_WABLAS');
        curl_setopt($curl, CURLOPT_URL, "https://jogja.wablas.com/api/device/info?token=$token");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        $api = json_decode($result, true);
        //var_dump($api);
        // return view('admin/apiwa', compact('api'));


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
        return view('admin.pesan', ['mhs' => $mhs->paginate(50)], compact('api'));

        // if($request){
        //     $mhs = Mahasiswa::where('angkatan', 'LIKE', '%' .$request->search. '%')->get();      
        // }else{
        //     $mhs = Mahasiswa::all();
        // }
        // return view('admin.pesan', compact('mhs', 'request'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ], ['ids.required' => 'Wajib memilih mahasiswa yang akan menerima pesan peringatan']);

        $ids = $request->ids;
        $mahasiswa = DB::table('mahasiswas')
            ->whereIn('id', $ids)
            ->select('nama', 'hp_mahasiswa')->get();
        // $mhs = Mahasiswa::query();

        // // dd(request("ids[{{ $mhsiswa->id }}]"));
        // $request->validate([
        //     // 'email' => 'required|email',
        //     //'subject' => 'required',
        //     'name' => 'required',
        //     'content' => 'required',
        //   ]);

        $kumpulan_data = [];
        foreach ($mahasiswa as $surang) {
            //var_dump($surang->nama);
            $mhs['phone'] = $surang->hp_mahasiswa;
            $mhs['message'] = request('pesan');
            $mhs['secret'] = false;
            $mhs['retry'] = false;
            $mhs['isGroup'] = false;
            array_push($kumpulan_data, $mhs);
        }
        //var_dump($kumpulan_data);
        WablasTrait::sendText($kumpulan_data);

        return redirect()->back()->with(['message' => 'Whatsapp Message successfully sent!']);
    }

    public function infoRiwayat(Request $request)
    {

        $curl = curl_init();
        $token = env('SECURITY_TOKEN_WABLAS');
        $date = '';
        if ($request->has('date')) {
            $date = $request->date;
        }

        $perPage = "";
        $phone = "";
        $page = "";

        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL,  "https://jogja.wablas.com/api/report/message?date=$date&perPage=$perPage&phone=$phone&page=$page");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        // echo "<pre>";
        //print_r($result);

        $data = json_decode($result);

        //dd($data);
        // echo '<br>';
        //var_dump($data);
        return view('admin/riwayatwa', compact('data'));


        //return redirect()->back()->with(['message' => 'Pesan Whatsapp Berhasil dikirim!']);
    }
}
