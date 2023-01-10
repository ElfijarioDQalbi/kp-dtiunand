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

    public function cekKoneksi()
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
        return view('admin/pesan', compact('api'));
    }

    public function infoRiwayat($date)
    {
        $curl = curl_init();
        $token = env('SECURITY_TOKEN_WABLAS');
        //$date = ;
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
        echo "<pre>";
        //print_r($result);

        $data = json_decode($result);

        //dd($data);
        // echo '<br>';
        //var_dump($data);
        return view('admin/riwayatPesan', compact('data'));
    }
}
