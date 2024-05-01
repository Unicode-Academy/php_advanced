<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', 'HomeController@index');
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');
    Route::get('/add', 'UserController@add')->name('users.add');
    Route::post('/add', 'UserController@handleAdd');
});