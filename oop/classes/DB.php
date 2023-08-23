<?php
class DB{

    static private $db;

    public function __construct(){
        self::$db = $this;
    }

    public function table($table){

        echo $table.'<br/>';

        return self::$db;
    }

    public function where($field, $compare, $value){

        echo 'where<br/>';

        return self::$db;
    }

    public function select($field='*'){
        echo $field.'<br/>';

        return self::$db;
    }

    public function get(){
        echo 'Run';
    }
}