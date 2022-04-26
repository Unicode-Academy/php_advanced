<?php
$subject = '123456';

$pattern = '/[^0-9]+/';

$check = preg_match($pattern, $subject);

var_dump($check);

echo '<hr/>';

$subject = 'php01234';

$pattern = '/(php|backend)\d+/';

$check = preg_match($pattern, $subject, $matches);

var_dump($check);

echo '<pre>';
print_r($matches);
echo '</pre>';