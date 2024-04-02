<?php
$whiteList = [
    'http://127.0.0.1:52251',
    'http://localhost:52251',
];

if (!empty($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $whiteList)) {
    header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
}

header("Access-Control-Allow-Methods: *"); //GET, POST, PUT, PATCH, DELETE
header("Access-Control-Allow-Headers: *"); //Content-Tye, Authorization