<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $title = "Học phân quyền";
        $status = false;
        return view('home', compact('title', 'status'));
    }
}