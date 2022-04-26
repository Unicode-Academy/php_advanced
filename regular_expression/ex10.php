<?php
$subject = '<img title="Ảnh" height="200" src="https://unicode.vn/images/anh.jpg" alt="" width="" style="width: 300px;"/>';

$pattern = '~<img.*src="(.+?)".*/*>~';

$check = preg_match($pattern, $subject, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';