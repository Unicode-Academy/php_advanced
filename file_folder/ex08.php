<?php
$path = 'unicode';

//Đổi tên
//rename($path, 'unicode-academy');

//Di chuyển folder

//rename('unicode-academy/courses', 'data/courses');

//rename('data/courses', 'unicode-academy');

//copy => tương tự rename

//xoá folder
//$pathDelete = 'unicode-academy';
//
//rmdir($pathDelete);

//Quét các file, folder trong 1 folder khác

$path = 'data';

$lists = scandir($path);

echo '<pre>';
print_r($lists);
echo '</pre>';