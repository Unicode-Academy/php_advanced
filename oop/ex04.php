<?php
require_once 'classes/Calculator.php';

$calc = new Calculator();

$calc->setUsername('hoangan.web@gmail.com');

$calc->setPassword('123456');

echo $calc->getUsername();
echo '<br/>';
echo $calc->getPassword();
