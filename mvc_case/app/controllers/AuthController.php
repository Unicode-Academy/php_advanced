<?php
//AuthController Controller
class AuthController extends Controller
{

    public $data = [], $model = [];

    public function __construct()
    {
        //construct
    }

    public function login()
    {
        $this->data['body'] = 'auth/login';
        $this->data['dataView']['pageTitle'] = 'Đăng nhập hệ thống';
        $this->render('layouts/auth', $this->data);
    }

    public function register()
    {
        $this->data['body'] = 'auth/register';
        $this->data['dataView']['pageTitle'] = 'Đăng ký tài khoản';
        $this->render('layouts/auth', $this->data);
    }
}
