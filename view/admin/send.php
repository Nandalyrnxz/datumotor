<?php
$token = "T55eqLPk9hqG2nfRfFts";
$target = "6285835739269";

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
    'target' => $target,
    'message' => 'test message', 

    ),
    CURLOPT_HTTPHEADER => array(
        "Authorization: $token"
        ),
    CURLOPT_SSL_VERIFYPEER => false, // Nonaktifkan verifikasi SSL

    ));

    $response = curl_exec($curl);

    if ($response === false) {
        echo 'Curl error: ' . curl_error($curl);
    } else {
        echo 'Response: ' . $response;
    }
    
    curl_close($curl);