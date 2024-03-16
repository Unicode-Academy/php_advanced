<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function __construct()
    {
        echo 'HomeController <br/>';
        $user = new User;
        echo $user->all();
    }
}
