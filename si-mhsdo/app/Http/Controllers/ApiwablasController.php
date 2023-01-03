<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiwablasController extends Controller
{
    public function cekno(){
$phones = "6289529993347";
$token = 'JNAp8QZuZUQCmTtg2qx1NBnlKyTIGvlN49sZ4NkurTfABgS0DmsQMqAMp1qBW3ei';
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER,
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
echo "<pre>";
print_r($result);
    
}


public function cekdevice(){
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
echo "<pre>";
print_r($result);
}

public function cekdevice(){
// cek device dengan tokennya
$curl = curl_init();
$token = "JNAp8QZuZUQCmTtg2qx1NBnlKyTIGvlN49sZ4NkurTfABgS0DmsQMqAMp1qBW3ei";
curl_setopt($curl, CURLOPT_URL, "https://eu.wablas.com/api/device/scan?token=$token");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($curl);
curl_close($curl);
echo "<pre>";
print_r($result);
}


}
