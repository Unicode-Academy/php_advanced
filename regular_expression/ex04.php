<?php
$subject = '123hoangan@gmail.com';
$pattern = '/[a-z]{0,5}/';

$check = preg_match($pattern, $subject);

var_dump($check);