<?php
require_once 'interfaces/RepositoryInterface.php';
require_once 'interfaces/ProductRepositoryInterface.php';
require_once 'classes/BaseRepository.php';
require_once 'classes/ProductRepository.php';

$product = new ProductRepository();
$products = $product->getProduct();
echo $products;
echo '<br/>';
$productDetail = $product->getDetailProduct(1);
echo $productDetail;