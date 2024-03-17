<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', 'HomeController@index');

Route::get('/users', function () {
    return '<h1>Danh sách người dùng</h1>';
})->name('users');

Route::get('/san-pham', function () {
    return '<h1>Danh sách sản phẩm</h1>';
})->name('products');

Route::get('/san-pham/them', function () {
    $view = <<<EOT
    <form method="post">
        <input type="text" name="name" />
        <button>Submit</button>
    </form>
    EOT;
    return $view;
});

Route::post('/san-pham/them', function () {
    return input('name');
});

Route::get('/users/{id}', function ($id) {
    $url = url('users');
    $productUrl = url('products');
    $view = <<<EOT
    <p>URL: $url</p>
    <p>Products: {$productUrl}</p>
    <h1>Người dùng: $id</h1>
    EOT;
    return $view;
});

Route::get('/admin', 'Admin\DashboardController@index');
