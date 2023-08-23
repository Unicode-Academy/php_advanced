<?php

$file = fopen('data.txt', 'a+');

$url = 'https://unicode.vn';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //tắt ssl
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //tắt ssl

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

curl_setopt($ch, CURLOPT_FILE, $file);

$result = curl_exec($ch);

curl_close($ch);

fclose($file);

var_dump($result);