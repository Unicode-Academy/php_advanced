<?php
/*
 * Ví dụ: Kiểm tra username có hợp lệ hay không?
 * - chứa: chữ thường hoặc số hoặc gạch dưới (_) hoặc gạch ngang (-)
 * - bắt đầu bằng chữ cái thường
 * */
$subject = 'hoangan_web'; //username

$pattern = '/^[a-z]+[a-z0-9_-]*$/';

$check = preg_match($pattern, $subject);

//var_dump($check);

/*
 * Ví dụ 2: Kiểm tra số điện thoại hợp lệ
 * - Bắt đầu bằng số 0
 * - Có 10 chữ số
 * */

$phone = '1388875179';
$pattern = '/^0\d{9}$/';

$check  = preg_match($pattern, $phone);
var_dump($check);