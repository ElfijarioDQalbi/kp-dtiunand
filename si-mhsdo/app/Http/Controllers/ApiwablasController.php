<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ApiwablasController extends Controller
{
    public function index()
    {
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
        return view('admin/apiwa', compact('api'));
    }

    public function cekNumber()
    {
        $phones = "6289529993347";
        $token = env('SECURITY_TOKEN_WABLAS');
        $curl = curl_init();
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "url: https://eu.wablas.com",
            )
        );
        curl_setopt($curl, CURLOPT_URL,  "https://phone.wablas.com/check-phone-number?phones=$phones");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        // echo "<pre>";
        // print_r($result);
        $data = json_decode($result);
        return view('admin/apiwa', compact('data'));
    }
}
