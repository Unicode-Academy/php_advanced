<?php
//UserController Controller
class UserController extends Controller
{

    private $data = [], $model = [];

    public function __construct()
    {
        //construct
    }

    public function index()
    {
        $this->data['body'] = 'users/index';
        $this->data['dataView']['pageTitle'] = 'Quản lý người dùng';
        $this->render('layouts/layout', $this->data);
    }
}
