<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/add', 'UserController@add')->name('users.add');
    Route::post('/add', 'UserController@handleAdd');
    Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('/edit/{id}', 'UserController@update');
    Route::post('/delete/{id}', 'UserController@delete')->name('users.delete');
});
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/add', 'ProductController@add')->name('products.add');
    Route::post('/add', 'ProductController@handleAdd');
    Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
    Route::post('/edit/{id}', 'ProductController@update');
    Route::post('/delete/{id}', 'ProductController@delete')->name('products.delete');
});