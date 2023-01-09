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

    public static function infoRealtime()
    {
        // cek device dengan tokennya

        $curl = curl_init();
        $token = env('SECURITY_TOKEN_WABLAS');
        $page = "";
        $limit = "";
        $message_id = "";
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL,  "https://jogja.wablas.com/api/report-realtime?page=$page&message_id=$message_id&limit=$limit");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);

        //print_r($result);
        $data = json_decode($result, true);
        dd($data);
        // echo '<br>';

        // return view('admin/riwayatpesan', compact('data'));    
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
