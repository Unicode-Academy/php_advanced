<?php

namespace App\Controllers;

class UserController
{
    public function index()
    {
        $data = ["User 1", "User 2"];
        return response()->httpCode(201)->header("x-api-key: 123")->json($data);
    }
}