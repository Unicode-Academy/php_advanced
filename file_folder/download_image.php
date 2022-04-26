<?php
$image = 'https://icdn.dantri.com.vn/zoom/1080_720/2022/04/08/hk-1649435751810.jpg';

$fileName = md5(uniqid()).'_'.basename($image);

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$content = file_get_contents($image, false, stream_context_create($arrContextOptions));

file_put_contents('images/'.$fileName, $content);