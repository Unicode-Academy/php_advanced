<?php
namespace App\Oop\Admin;

class Post{

    public function __construct($str){
        echo 'Admin Post Class: '.$str;
    }

    final public function getList(){
        echo 'getList Admin Post';
    }
}