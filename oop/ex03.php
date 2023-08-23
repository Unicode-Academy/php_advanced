<?php
require_once 'classes/Calculator.php';
//use Demo\Calculator;

//error_reporting(-1);

$calc = new Calculator();

//I. Kiểm thuộc tính tồn tại

//Cách 1: Kiểm tra bằng hàm isset() hoặc empty()
if (isset($calc->numberC)){
    echo $calc->numberC;
}

echo '<hr/>';
//Cách 2: Kiểm tra bằng hàm property_exists()

if (property_exists('Calculator', 'numberC')){
    echo $calc->numberC;
}else{
    echo 'Thuộc tính không tồn tại';
}

echo '<hr/>';

//II. Kiểm tra phương thức tồn tại

if (method_exists($calc, 'showMsg')){
    echo $calc->showMsg();
}else{
    echo 'Phương thức không tồn tại';
}

echo '<hr/>';

$className = Calculator::class;

echo 'Tên class là: '.$className.'<br/>';