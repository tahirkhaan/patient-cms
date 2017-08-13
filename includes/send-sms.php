<?php

function sendSMS($phone, $message)
{
    include_once __DIR__ . "/../config/sms-api.php";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiURL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\"phone\": \"" . $phone . "\",\n\"message\":\"" . $message . "\",\n\"client\": \"" . $clientID . "\"\n}",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if (php_sapi_name() === 'cli') {
        print $response;
    } else {
        if ($err) {
            return json_encode(array('success' => 'false', 'err' => $err));
        } else {
            return $response;
        }
    }
}
