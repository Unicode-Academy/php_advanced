<?php
$url = 'https://unicode.vn/api/add_customer.php';

$dataPost = [
    'name' => 'Hoàng An',
  //  'email' => 'hoangan.web@gmail.com'
];

$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataPost));

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

$result = curl_exec($ch);

curl_close($ch);

if (!empty($result)){
    $response = json_decode($result, true);
    echo '<pre>';
    print_r($response);
    echo '</pre>';
}