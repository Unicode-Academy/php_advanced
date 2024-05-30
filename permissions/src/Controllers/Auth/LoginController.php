<?php
namespace App\Controllers\Auth;

use App\Models\User;
use System\Core\Session;

class LoginController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User;
    }
    public function login()
    {
        $pageTitle = 'Đăng nhập hệ thống';

        return view('auth.login', compact('pageTitle'));
    }

    public function handleLogin()
    {
        $email = input('email');
        $password = input('password');
        //Lấy thông tin user theo email
        $user = $this->userModel->findUser($email, 'email');
        if (!$user) {
            return;
        }
        $passwordHash = $user->password;
        $status = password_verify($password, $passwordHash);
        if (!$status) {
            return;
        }

        Session::data('user_login', $user);
        return redirect('/');
    }
}
