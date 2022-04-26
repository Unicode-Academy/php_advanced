<?php
$pattern = '~^(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z])(?=.*[!@#\$%\^\*\(\)-\+]).{8,}$~';

$password = 'AnAB@123';

$checkPassword = preg_match($pattern, $password);

if ($checkPassword){
    echo 'Mật khẩu mạnh';
}else{
    echo 'Mật khẩu yếu';
}