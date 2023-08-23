<?php
require_once 'classes/Calculator.php';
require_once 'classes/Math.php';

$config = [
    'baseUploads' => './uploads',
    'allowFiles' => 'jpg,png,jpeg',
    'maxSize' => '1024'
];
$calc = new Calculator();

echo '<br/>';

echo $calc->showMsg();

$calc->setUsername('Hoàng An');

echo $calc->getUsername();

echo '<br/>';

echo $calc->numberC.'<br/>';

echo $calc->sqrt(2.5).'<br/>';