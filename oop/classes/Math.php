<?php
class Math{

    private $number1 = 123;
    private $number2 = 456;

    /*tự động chạy phương thức __get khi truy cập vào thuộc tính có phạm vi không được phép*/
    function __get($name){
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function __call($name, $arguments)
    {
       echo 'Phương thức <b>'.$name.'</b> không tồn tại <br/>';

       if (!empty($arguments)){
           echo 'Các tham số nhận được là: '.implode(', ', $arguments);
       }

    }

    public static function __callStatic($name, $arguments)
    {
        echo 'Phương thức <b>'.$name.'</b> không tồn tại <br/>';

        if (!empty($arguments)){
            echo 'Các tham số nhận được là: '.implode(', ', $arguments);
        }
    }

    public function sqrt($number){
        $result = sqrt($number);
        return $result;
    }

    public function getNumber(){
        return $this->number1;
    }

    public function setNumber($value){
        $this->number1 = $value;
    }
}