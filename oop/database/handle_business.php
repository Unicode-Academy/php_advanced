<?php

require_once 'config.php';
require_once 'includes/Database.php';
require_once 'includes/Business.php';

use App\Database\Database;
use App\Database\Business;

$business = new Business();

//$data = $business->getRaw("SELECT * FROM users");

//$data = $business->first('id=8');

//$data = $business->count('id>8');
//
//echo '<pre>';
//print_r($data);
//echo '</pre>';

//$data = [
//    'name' => 'hoàng an new',
//    'email' => 'hoangannew@gmail.com',
//    'status' => 0,
//    'create_at' => date('Y-m-d H:i:s')
//];
//
//$business->insert($data);

$id = 16;
//$data = [
//    'name' => 'Hoàng an update'
//];

//$business->update($data, $id);

$business->delete($id);







