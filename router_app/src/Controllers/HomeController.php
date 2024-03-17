<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        $users = User::all();

        return view('index', compact('users'));
    }
}
