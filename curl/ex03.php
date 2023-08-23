<?php
$url = 'http://localhost/php_advanced/curl/server.php?user_id=1&keyword=php';

$data = [
    'username' => 'hoangan.web',
    'email' => 'hoangan.web@gmail.com'
];

//username=hoangan.web&email=hoangan.web@gmail.com

$queryString = http_build_query($data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url); //Set url cần request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Trả về kết quả (giống hàm)

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //tắt ssl
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //tắt ssl

//curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $queryString); //

//curl_setopt($ch, CURLOPT_HTTPGET, false);


curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded'
]);

$result = curl_exec($ch);

curl_close($ch);

var_dump($result);