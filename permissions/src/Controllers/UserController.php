<?php
namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function __construct()
    {
        $this->userModel = new User;
    }
    public function index()
    {
        $pageTitle = 'Quản lý người dùng';
        $users = $this->userModel->getUsers();
        return view('users.index', compact('pageTitle', 'users'));
    }
}
