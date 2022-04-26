<?php

//Tạo bản thiết kế
class Number{

    //Thuộc tính (biến)
    public $numberA = 1;
    public $numberB = 2;

    //Phương thức (Hàm)
    function makeTotal($a, $b){
        return $a + $b;
    }
}

//Khởi tạo đối tượng
$numberObj = new Number();

$total = $numberObj->makeTotal($numberObj->numberA, $numberObj->numberB);

echo $total;