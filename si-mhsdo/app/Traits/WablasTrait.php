<?php

namespace App\Traits;

trait WablasTrait
{
    public static function sendText($data = [])
    {
        $curl = curl_init();
        $token = env('SECURITY_TOKEN_WABLAS');
        $payload = [
            "data" => $data
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "Content-Type: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL,  env('DOMAIN_SERVER_WABLAS') . "/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
    }

    public function cekNumber()
    {
        $phones = "6289529993347";
        $token = 'JNAp8QZuZUQCmTtg2qx1NBnlKyTIGvlN49sZ4NkurTfABgS0DmsQMqAMp1qBW3ei';
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


    public static function cekDevice()
    {
        // cek device dengan tokennya
        $curl = curl_init();
        $token = "JNAp8QZuZUQCmTtg2qx1NBnlKyTIGvlN49sZ4NkurTfABgS0DmsQMqAMp1qBW3ei";
        curl_setopt($curl, CURLOPT_URL, "https://eu.wablas.com/api/device/info?token=$token");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        //echo "<pre>";
        //print_r($result);
        // dd($result);
        $data = json_decode($result);
        return view('admin/apiwa', compact('data'));
    }
}
