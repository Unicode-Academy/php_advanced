<?php
//namespace Demo;

class Calculator{
    //Khai báo thuộc tính
    var $numberA, $numberB; /*Sử dụng từ khoá var để khai báo thuộc tính => PHP sẽ ngầm hiểu phạm vi là public*/

    var $numberC;

    private $username='hoanganit', $password='123456', $math;

    //Khai báo hằng số
    const _MSG_CONTENT = 'Kết quả là: {value}';

    public function __construct($config=[]){
       // echo 'Hàm khởi tạo';
        $this->numberC = 30;

        $this->math = new Math();

        echo '<pre>';
        print_r($config);
        echo '</pre>';

    }

//    public function Calculator(){
//        echo 'Hàm khởi tạo';
//    }

    //Phương thức gán giá trị cho thuộc tính numberA
    public function setNumberA($value){
        $this->numberA = $value;
    }

    //Phương thức gán giá trị cho thuộc tính numberB
    public function setNumberB($value){
        $this->numberB = $value;
    }

    //Phương thức lấy giá trị thuộc tính numberA
    public function getNumberA(){
        return $this->numberA;
    }

    //Phương thức lấy giá trị thuộc tính numberB
    public function getNumberB(){
        return $this->numberB;
    }

    public function getParams($valueA, $valueB){
        if ($valueA==0){
            $valueA = $this->numberA;
        }

        if ($valueB==0){
            $valueB = $this->numberB;
        }

        return [
            'valueA' => $valueA,
            'valueB' => $valueB
        ];
    }

    //Khai báo phương thức
    function makeAdd($valueA=0, $valueB=0){

        $paramsArr = $this->getParams($valueA, $valueB);

        $valueA = $paramsArr['valueA'];
        $valueB = $paramsArr['valueB'];

        $result = $valueA+$valueB;

        return $result;
    }

    public function makeMinus($valueA, $valueB){

        $paramsArr = $this->getParams($valueA, $valueB);

        $valueA = $paramsArr['valueA'];
        $valueB = $paramsArr['valueB'];

        $result = $valueA - $valueB;
        return $result;
    }

    public function makeMultiply($valueA, $valueB){

        $paramsArr = $this->getParams($valueA, $valueB);

        $valueA = $paramsArr['valueA'];
        $valueB = $paramsArr['valueB'];

        $result = $valueA * $valueB;
        return $result;
    }

    public function makeDivide($valueA, $valueB){

        $paramsArr = $this->getParams($valueA, $valueB);

        $valueA = $paramsArr['valueA'];
        $valueB = $paramsArr['valueB'];

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

    public function demoThis(){
        return $this;
    }

    public function showMsg(){
        //return 'Demo msg';
        return __CLASS__;
    }

    public function setUsername($value){
        $this->username = $value;
    }

    public function setPassword($value){
        $this->password = $value;
    }

    public function getUsername(){
        //return $this->username;
        $this->showInfo('username', $this->username);
    }

    public function getPassword(){
        //return $this->password;
        $this->showInfo('password', $this->password);
    }

    private function showInfo($type, $value){
        if ($type=='username'){
            echo 'Username: '.$value;
        }elseif ($type=='password'){
            echo 'Password: '.$value;
        }else{
            echo 'Không hợp lệ';
        }
    }

    public function sqrt($number){
        if (is_float($number)){
            return $this->math->sqrt($number);
        }

        return 0;
    }

    public function __destruct(){
        echo 'Hàm huỷ';
    }
}


