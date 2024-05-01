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

    public function add()
    {
        $pageTitle = 'Thêm người dùng';
        return view('users.add', compact('pageTitle'));
    }

    public function handleAdd()
    {
        $data = input()->all();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->userModel->addUser($data);
        return redirect('/users');
    }
}