<?php

$subject = '<a href="https://unicode.vn" target="_blank">Unicode Academy</a>';

//$subject = '<input type="text" class="field-input"/>';

$pattern = '~^<[a-z]+(\s+[a-z-]+\s*=\s*"[^"]+")*(>.+</[a-z]+>|\s*/>)$~';

$check = preg_match($pattern, $subject);

if ($check){
    echo 'HTML hợp lệ';
}else{
    echo 'HTML không hợp lệ';
}