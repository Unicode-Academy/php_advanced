<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $pageTitle = 'Trang tổng quan';
        $title = "Học phân quyền";
        $status = false;
        return view('home', compact('title', 'status', 'pageTitle'));
    }
}