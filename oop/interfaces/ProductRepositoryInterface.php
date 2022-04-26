<?php
interface ProductRepositoryInterface{
    public function getProduct();

    public function getDetailProduct($id);

    public function addProduct($data);
}