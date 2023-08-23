<?php
function redirect($path=''){
    header("Location: ".$path);
    exit;
}

function getUrl($path=''){

    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
        $protocol = 'https://';
    }else{
        $protocol = 'http://';
    }

    $result = $protocol.$_SERVER['HTTP_HOST'];

    if (!empty($_SERVER['PHP_SELF'])){
        $result.='/'.dirname($_SERVER['PHP_SELF']);
    }

    if (!empty($path)){
        $result.='?path='.$path;
    }

    return $result;
}