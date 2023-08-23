<?php
class Animal{

    public static function render(){
        //echo self::getName();
         echo static::getName();;
    }

    public static function getName(){
        return 'Đây là động vật';
    }
}