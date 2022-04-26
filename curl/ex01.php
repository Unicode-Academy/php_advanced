<?php

$url = 'https://unicode.vn';

//Khởi tạo CURL

$ch = curl_init(); //có thể đưa url muốn request

//Cấu hình CURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Thực thi CURL
$result = curl_exec($ch);

//Hiển thị lỗi curl
$errors = curl_error($ch);

//Đóng CURL
curl_close($ch);

echo $result;