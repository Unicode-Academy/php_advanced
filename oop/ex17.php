<?php
require_once 'classes/DB.php';

//Khởi tạo
new DB();

//Sử dụng
//DB::table('users')->select()->where('id', '=', 1)->get();

DB::where('id', '=', 1)->table('users')->select()->get();