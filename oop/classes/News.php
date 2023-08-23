<?php
namespace App\Oop;
use App\Oop\Admin\Post;
class News extends Post{
    public function getList(){
        echo 'Override';
    }
}