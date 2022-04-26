<?php
$url = 'https://www.unicode.vn:8080/khoa-hoc';

$pattern = '~^(http|https)://[a-z]+[a-z-_\.]*\.[a-z]{2,}(:\d+)?(/?|/[a-z-_0-9\./]*)$~';

$check = preg_match($pattern, $url);

if ($check){
    echo 'URL hợp lệ';
}else{
    echo 'URL không hợp lệ';
}