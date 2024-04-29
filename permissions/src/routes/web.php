<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', 'HomeController@index');
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');
});
