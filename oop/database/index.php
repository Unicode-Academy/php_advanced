<?php
require_once 'config.php';
require_once 'includes/Database.php';
require_once 'includes/Business.php';

use App\Database\Database;
use App\Database\Business;

//$db = new Database();
//
//$sql = "SELECT * FROM users WHERE id=1 ORDER BY id DESC";
//
////$data = $db->getRaw($sql);
//
//$data = $db->getRaw($sql);
//
//echo '<pre>';
//print_r($data);
//echo '</pre>';

//echo 'Họ tên: '.$data[0]['name'];

//for ($index = 0; $index < 10; $index++){
//    $dataInsert = [
//        'name' => 'Hoàng An '.rand(1, 100),
//        'email' => 'hoangan'.rand(1, 100).'@gmail.com',
//        'status' => rand(0,1),
//        'create_at' => date('Y-m-d H:i:s')
//    ];
//
//    $db->insert('users', $dataInsert);
//}
//

//$condition = 'id = 13';

//$dataUpdate = [
//    'name' => 'Hoàng an Update',
//    'status' => 0
//];
//
//
//$db->update('users', $dataUpdate, $condition);
//

//$db->delete('users', $condition);

//$sql = "SELECT * FROM users WHERE id>=10";
//
//$count = $db->getRows($sql);
//
////echo $count;
//
//$dataInsert = [
//        'name' => 'Hoàng An '.rand(1, 100),
//        'email' => 'hoangan'.rand(1, 100).'@gmail.com',
//        'status' => rand(0,1),
//        'create_at' => date('Y-m-d H:i:s')
//    ];
//
//$db->insert('users', $dataInsert);
//
////$id = $db->insertId();
//$id = $db->getPdo()->lastInsertId();
//
//echo 'Id vừa insert: '.$id;