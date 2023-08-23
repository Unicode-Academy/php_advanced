<?php
class Person{
    public static $fullName='Hoàng An';
    public static $age = 30;

    public $location = 'Hà Nội';

    public static $person;

    public function __construct(){
        self::$person = $this;
    }

    public function getMessage(){
        return 'Đăng ký tài khoản thành công';
    }

    public static function getName(){
//        echo self::getMessage();
//        echo '<br/>';
//        echo 'Địa điểm: '.self::$person->location;
//        echo '<br/>';
        echo self::$person->getMessage();
        echo '<br/>';
        return 'Tên của bạn là: '.self::$fullName;
    }

    public function getAge(){
//        echo self::getMessage();
//        echo '<br/>';
        echo 'Địa điểm: '.($this->location);
        echo '<br/>';
        return 'Tuổi của bạn là: '.self::$age;
    }
}