<?php

$phone = '0388875179'; //Chuỗi cần so khớp

$pattern = '~^0[0-9]{9}$~'; //khuôn mẫu

$check = preg_match($pattern, $phone, $matches);

var_dump($check);

echo '<pre>';
print_r($matches);
echo '</pre>';
