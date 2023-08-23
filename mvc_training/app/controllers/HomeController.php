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
        //Index
        $this->render('welcome');
    }
}
