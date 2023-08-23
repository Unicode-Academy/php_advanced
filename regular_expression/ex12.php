<?php
$subject = 'https://unicode.vn/khoa-hoc/page/1';

$pattern = '~\d+$~';

$result = preg_replace($pattern, 'trang', $subject);

echo $result;

echo '<hr/>';

$content = 'Lorem Ipsum is simply dummy 0388875179 text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 0388875179 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 0123456789';

$pattern = '~0\d{9}~';

$replace = '<a href="https://unicode.vn/login"><b>Đăng nhập để lấy số điện thoại</b></a>';

$content = preg_replace($pattern, $replace, $content, 2);

echo $content;