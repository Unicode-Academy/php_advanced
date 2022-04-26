<?php
require_once 'includes/functions.php';

$urlLogin = 'https://my.vnexpress.net/authen/users/login';

//Lấy csrf token

$content = httpGet($urlLogin);

preg_match('~name="csrf" value="(.+)"~i', $content, $csrfArr);

if (!empty($csrfArr[1])){
    $token = trim($csrfArr[1]);

    $dataLogin = [
        'csrf' => $token,
        'myvne_email' => 'hoangan.web@gmail.com',
        'myvne_password' => 'pveser@123',
        'view_app' => 0
    ];



    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $urlLogin);
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

    //Xử lý request tiếp theo (Sau khi đã đăng nhập thành công)
    curl_setopt($ch, CURLOPT_URL, 'https://my.vnexpress.net/users/tin-da-luu');

    $result = curl_exec($ch);

    curl_close($ch);

    var_dump($result);

}