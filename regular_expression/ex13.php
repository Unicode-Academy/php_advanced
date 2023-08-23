<?php
$content = 'Lorem Ipsum is simply dummy 0388875179 text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled contact@unicode.vn it to make a type specimen book. 0388875179 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset hoangan.web@gmail.com sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 0123456789';

echo $content;

echo '<hr/>';

$pattern = '~(0\d{9})~';

$replace = '<a href="tel:$1">$1</a>';

$content = preg_replace($pattern, $replace, $content);

$content = preg_replace('~([a-z]+[a-z-_\.0-9]{2,}@([a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}))~', '<a href="mailto:$1" title="Email: $2">$1</a>', $content);

echo $content;