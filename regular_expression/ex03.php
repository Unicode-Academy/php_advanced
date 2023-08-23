<?php
/*
 * Kiểm tra mật khẩu có hợp lệ hay không?
 * - bắt đầu bằng chữ cái thường
 * - độ dài >=6
 * - kết thúc bằng số
 * */
$password = 'abc123a';

//$pattern = '/^[a-z][0-9]$/';

$pattern1 = '/^[a-z]/';

$pattern2 = '/[0-9]$/';

if (strlen($password)>=6 && preg_match($pattern1, $password) && preg_match($pattern2, $password)){
    echo 'Mật khẩu hợp lệ';
}else{
    echo 'Mật khẩu không hợp lệ';
}