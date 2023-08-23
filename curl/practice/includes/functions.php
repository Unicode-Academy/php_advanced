<?php
function httpGet($url, $file=null){

    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    if (!empty($file)){

        curl_setopt($ch, CURLOPT_FILE, $file);
    }

    $result = curl_exec($ch);

    curl_close($ch);

    if (!empty($file)){
        fclose($file);
    }

    return $result;

}

function downloadImage($url, $folder){

    $fileName = basename($url);

    $image = fopen($folder.'/'.$fileName, 'a+');

    return httpGet($url, $image);
}








