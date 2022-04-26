<?php
/*
 * Tạo Class có tên Calculator để tính toán 4 phép tính sau:
 * - add: Phép cộng
 * - minus: Phép trừ
 * - multiply: Phép nhân
 * - divide: Phép chia
 * */

class Calculator{

    //Khai báo thuộc tính
    var $numberA=1, $numberB=2; /*Sử dụng từ khoá var để khai báo thuộc tính => PHP sẽ ngầm hiểu phạm vi là public*/


    //Khai báo hằng số
    const _MSG_CONTENT = 'Kết quả là: {value}';

    //Khai báo phương thức
    function makeAdd($valueA, $valueB){
        $result = $valueA+$valueB;
        return $result;
    }

    public function makeMinus($valueA, $valueB){
        $result = $valueA - $valueB;
        return $result;
    }

    public function makeMultiply($valueA, $valueB){
        $result = $valueA * $valueB;
        return $result;
    }

    public function makeDivide($valueA, $valueB){
        if ($valueB>0){
            $result = $valueA / $valueB;

            return $result;
        }

        return 'Không chia cho số 0';

    }

    public function showResult($msg, $value){
        echo str_replace('{value}', $value, $msg);
    }

    public function showShortResult($value){
        $msg = $this::_MSG_CONTENT;
        $this->showResult($msg, $value);
    }

}

//Khởi tạo đối tượng

$calc = new Calculator();

//Lấy giá trị thuộc tính
echo $calc->numberA;
echo '<br/>';
echo $calc->numberB;

echo '<hr/>';
//Gán giá trị mới cho thuộc tính
$calc->numberA = 10;
$calc->numberB = 20;

echo $calc->numberA;
echo '<br/>';
echo $calc->numberB;


echo '<hr/>';

echo $calc->makeAdd($calc->numberA, $calc->numberB);

echo '<hr/>';

echo Calculator::_MSG_CONTENT;

echo '<hr/>';

echo '<h3>Thông báo kết quả: </h3>';

$total = $calc->makeAdd($calc->numberA, $calc->numberB);

//$calc->showResult($calc::_MSG_CONTENT, $total);

$calc->showShortResult($total);
