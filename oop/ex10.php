<?php
require_once 'classes/Model.php';

require_once 'classes/ProductModel.php';

$productModel = new ProductModel();

var_dump($productModel->show());