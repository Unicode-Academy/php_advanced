<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1', 'namespace' => '\App\Controllers\V1'], function () {
        Route::get('/users', 'UserController@index');
        Route::get('/users/{id}', 'UserController@find');
        Route::post('/users', 'UserController@store');
    });
});
