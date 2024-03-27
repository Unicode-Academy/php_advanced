<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1', 'namespace' => '\App\Controllers\V1'], function () {
        Route::get('/users', 'UserController@index');
        Route::get('/users/{id}', 'UserController@find');
        Route::post('/users', 'UserController@store');
        Route::patch('/users/{id}', 'UserController@update');
        Route::put('/users/{id}', 'UserController@update');
        Route::delete('/users/{id}', 'UserController@delete');
        Route::delete('/users', 'UserController@deletes');
    });
});
