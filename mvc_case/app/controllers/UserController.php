<?php
//UserController Controller
class UserController extends Controller
{

    private $data = [], $userModel = [];

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $this->data['body'] = 'users/index';
        $this->data['dataView']['pageTitle'] = 'Quản lý người dùng';

        $users = $this->userModel->getUsers();
       
        $this->data['dataView']['users'] = $users;

        $this->render('layouts/layout', $this->data);
    }
}