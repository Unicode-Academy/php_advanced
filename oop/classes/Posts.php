<?php
class Posts{

//    use Database;
//    use Business;

    use Auth;

    //public $table = 'posts';

    function __construct(){
        $this->table = 'posts';
    }

    public function getList(){
        echo 'Hello getList';
        echo '<br/>';
        echo $this->fetch();
        echo '<br/>';
        echo $this->methodFromBs();
        echo '<br/>';
        echo $this->methodFromAuth();
//        echo $this->table;
    }
}