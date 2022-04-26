<?php
$path = 'content.txt';

$content = 'Khoá học PHP nâng cao';

$status = file_put_contents($path, $content);
/*
 * - Thay thế nội dung cũ
 * - Không cần resource fopen()
 * - Nếu file không tồn tại => Tự động tạo mới
 * */

var_dump($status);