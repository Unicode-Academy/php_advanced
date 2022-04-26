<?php
//$subject = 'hoanganit19@gmail.com';
//$subject = 'HOANGANa';
$subject = 'hoanganweb_@gmail.com';

$pattern = '/@_/'; // /@_/

$check = preg_match($pattern, $subject);

var_dump($check);