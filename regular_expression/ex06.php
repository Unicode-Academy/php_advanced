<?php
/*
 * Ví dụ: Kiểm tra email hợp lệ
 * Cấu trúc email: <username>@<domain>.<ext>
 * - username:
 *  + chứa: chữ thường, gạch ngang (-), gạch dưới (_), dấu chấm (.), chữ số
 *  + bắt đầu bằng chữ cái thường
 *  + Độ dài: >=3
 *
 * - domain:
 *  + chứa: chữ thường, gạch ngang (-), gạch dưới (_), dấu chấm (.), chữ số
 *  + bắt đầu bằng chữ cái thường
 *  + Độ dài: >=1
 *
 * - ext:
 *  + chứa: chữ thường
 *  + Độ dài >=2 ký tự
 * */

$email = 'hoangan.web@gmail.vn';

$pattern = '/^[a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}$/';

$check = preg_match($pattern, $email);

var_dump($check);