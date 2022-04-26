<?php
class Bussiness extends Database {

//    public function __construct($table){
//
//        parent::__construct(); //Gọi đến __construct() của class cha
//
//        $this->table = $table;
//    }

    //protected $table = 'users';

    public function getDetail(){

        //$this->table = 'users';

        return $this->fetch();
    }

    public function methodFromBs(){
        echo 'methodFromBs <br/>';
    }

//    public function fetch(){
//        return 'Fetch từ class Bussiness: '.parent::fetch();
//    }

}