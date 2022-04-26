<?php

$content = 'unicode academy academy unicode';

$pattern = '/academy(?=\sacademy)/';

preg_match($pattern, $content, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';