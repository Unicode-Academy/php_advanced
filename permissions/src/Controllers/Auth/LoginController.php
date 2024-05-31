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

        $msg = Session::flash('msg');

        return view('auth.login', compact('pageTitle', 'msg'));
    }

    public function handleLogin()
    {
        $email = input('email');
        $password = input('password');
        //Lấy thông tin user theo email
        $user = $this->userModel->findUser($email, 'email');
        $msgFailed = 'Tài khoản hoặc mật khẩu không đúng';
        if (!$user) {
            Session::flash('msg', $msgFailed);
            return redirect(url('auth.login'));
        }
        $passwordHash = $user->password;
        $status = password_verify($password, $passwordHash);
        if (!$status) {
            Session::flash('msg', $msgFailed);
            return redirect(url('auth.login'));
        }

        Session::data('user_login', $user);
        return redirect('/');
    }

    public function logout()
    {
        Session::delete('user_login');
        return redirect(url('auth.login'));
    }
}
