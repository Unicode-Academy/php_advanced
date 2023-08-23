<?php
class Number{
    //public static $number = 0;

    public $number = 0;

    public function __construct(){
//        self::$number++;
//        echo 'Giá trị: '.self::$number.'<br/>';

        $this->number++;

        echo 'Giá trị: '.$this->number. '<br/>';
    }
}