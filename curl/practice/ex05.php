<?php

require_once 'includes/functions.php';

$loginUrl = 'https://nhachinhchu.com.vn/Member/Login';

//Lấy token
$content = httpGet($loginUrl);

preg_match('~name="__RequestVerificationToken" type="hidden" value="(.+?)"~i', $content, $tokenArr);

if (!empty($tokenArr[1])){
    $token = trim($tokenArr[1]);

    $dataLogin = [
        '__RequestVerificationToken' => $token,
        'LoginEmail' => 'hoangan.web@gmail.com',
        'LoginPassword' => 'songlong'
    ];

    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $loginUrl);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataLogin));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE, './logs/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, './logs/cookie.txt');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $result = curl_exec($ch);

    curl_close($ch);

    var_dump($result);
}