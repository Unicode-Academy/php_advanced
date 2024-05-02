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

    public function edit($id)
    {
        $pageTitle = 'Cập nhật người dùng';
        $user = $this->userModel->findUser($id);
        if (!$user) {
            $error = new \Error('User not found', 403);
            throw $error;
        }
        return view('users.edit', compact('pageTitle', 'user'));
    }

    public function update($id)
    {
        $data = input()->all();
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        } else {
            unset($data['password']);
        }

        $this->userModel->updateUser($id, $data);
        return redirect('/users/edit/' . $id);
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        return redirect('/users');
    }
}
