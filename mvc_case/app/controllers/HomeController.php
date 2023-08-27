<?php
//HomeController Controller
class HomeController extends Controller
{

    public $data = [], $model = [];

    public function __construct()
    {
        //construct
    }

    public function index()
    {

        $this->data['body'] = 'welcome';
        $this->data['dataView']['pageTitle'] = 'Trang chủ';
        $this->render('layouts/layout', $this->data);
    }
}
