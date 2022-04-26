<?php
require_once '../../config.php'; //load config file
require_once '../../includes/Database.php'; //load class Database
require_once '../../includes/Business.php'; //load class Business
require_once 'Users.php'; //load class Users

use App\Database\Module\Users;

$users = new Users();

//$listUsers = $users->get();
//
//echo '<pre>';
//print_r($listUsers);
//echo '</pre>';

$userDetail = $users->find(1);

echo '<pre>';
print_r($userDetail);
echo '</pre>';