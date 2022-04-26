<?php
$file = fopen('data.txt', 'a');

//Ghi file
$content = 'Chào mừng bạn đến với Unicode'."\n";
$status = fwrite($file, $content);
//Ghi xuống cuối file
//Nếu muốn giữ nội dung cũ => chọn mode a+
var_dump($status);

fclose($file);