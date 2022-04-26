<?php
require_once 'classes/Database.php';

require_once 'classes/Bussiness.php';

require_once 'classes/Users.php';

//Khởi tạo đối tượng từ lớp con
//$bussiness = new Bussiness();

//$bussiness->table = 'users';

//echo $bussiness->getDetail();

//$bussiness->methodFromDb();

//echo $bussiness->fetch();

//$posts = new Bussiness('posts');
//echo $posts->getDetail();

echo '<hr/>';

//Khởi tạo đối tượng từ lớp cha

//$db = new Database();
//
//$db->methodFromDb();

$user = new Users();

echo $user->getUserDetail();