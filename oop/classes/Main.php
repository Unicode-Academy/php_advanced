<?php
namespace App\Oop;

//use App\Oop\Home\Post as HomePost;
//use App\Oop\Admin\Post as AdminPost;

//use App\Oop\Home\Post;
//use App\Oop\Home\Product;
use App\Oop\Home\{Post,Product};
use \DateTime;

class Main{
    public function __construct(){
        $homePost = new Post();
        echo '<br/>';
        //$adminPost = new AdminPost('Unicode');

        $homeProduct = new Product();

        echo '<br/>';

        $current = new DateTime();

        var_dump($current);
    }
}