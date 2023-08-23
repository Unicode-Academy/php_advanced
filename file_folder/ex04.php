<?php
$path = 'content.txt';

//Đọc bằng hàm file()

//$content = file($path);

//$content = implode("\n", $content);
//
////echo '<pre>';
////print_r($content);
////echo '</pre>';
//
//echo $content;

//$file = fopen('content.txt', 'r');
//
//$data = fread($file, filesize($path));
//
//$dataArr = explode("\n", $data);
//
//echo '<pre>';
//print_r($dataArr);
//echo '</pre>';

$data = file_get_contents($path);

$dataArr = explode("\n", $data);

echo '<pre>';
print_r($dataArr);
echo '</pre>';