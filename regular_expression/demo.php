<?php
$phone = '0388875179'; //Chuỗi cần so khớp

$pattern = '/^0[0-9]{9}$/'; //khuôn mẫu

$check = preg_match($pattern, $phone);

if (!empty($check)){
    echo $phone.': Là số điện thoại';
}else{
    echo $phone.': Không là số điện thoại';
}