<?php
require_once 'classes/Calculator.php';

$calc = new Calculator;

//var_dump($calc->demoThis());

//var_dump(Calculator::demoThis());

//echo $calc->makeAdd(1,3);
//
//echo '<br/>';
//
//echo Calculator::makeAdd(1,3);

$calc->setNumberA(10);
$calc->setNumberB(20);

//$total = $calc->makeAdd($calc->getNumberA(), $calc->getNumberB());

$calc->setNumberA(100);
$calc->setNumberB(300);

$total = $calc->makeAdd(100, 200);

$calc->showShortResult($total);

