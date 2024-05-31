<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $pageTitle = 'Trang tổng quan';
        return view('home', compact('pageTitle'));
    }
}
