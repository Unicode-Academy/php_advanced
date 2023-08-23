<?php
require_once '../../config.php'; //load config file
require_once '../../includes/Database.php'; //load class Database
require_once '../../includes/Business.php'; //load class Business
require_once 'ProductCategory.php'; //load class ProductCategory

use App\Database\Module\ProductCategory;
$category = new ProductCategory;

//$category->insert(
//    ['name' => 'Kinh doanh']
//);

$detail = $category->find(1);

echo '<pre>';
print_r($detail);
echo '</pre>';