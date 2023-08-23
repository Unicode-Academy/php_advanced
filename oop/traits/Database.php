<?php
trait Database{

    private $table;

    public function fetch(){
        return 'Lấy dữ liệu từ table: '.$this->table.'<br/>';
    }

    public function methodFromDb(){
        echo 'methodFromDb <br/>';

    }
}