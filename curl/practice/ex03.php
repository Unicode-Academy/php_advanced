<?php
/*
 * Đăng nhập vào website khác dùng cURL
 *
 * - Trường hợp 1: Không có token ở form đăng nhập
 * - Trường hợp 2: Có token ở form đăng nhập
 * - Trường hợp 3: Chỉ cho phép đăng nhập 1 thời điểm ở 1 máy tính
 * */

$urlLogin = 'https://unicode.vn/wp-login.php';

$dataLogin = [
    'log' => 'demo',
    'pwd' => '123456',
    'testcookie' => 1
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

curl_close($ch);

var_dump($result);








