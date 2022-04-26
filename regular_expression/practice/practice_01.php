<?php
$phone = '+84388875179'; //số điện thoại cần kiểm tra
$pattern = '/^(0|\+84)\d{9}$/';
$check = preg_match($pattern, $phone);

if ($check){
    echo 'Số điện thoại hợp lệ';
}else{
    echo 'Số điện thoại không hợp lệ';
}