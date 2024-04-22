<?php

use App\Middlewares\AuthMiddleware;
use Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', function () {
    return '<h1>API Reference</h1>';

});
Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1', 'namespace' => '\App\Controllers\V1'], function () {
        Route::get('/users', 'UserController@index');
        Route::get('/users/{id}', 'UserController@find');
        Route::post('/users', 'UserController@store');
        Route::patch('/users/{id}', 'UserController@update');
        Route::put('/users/{id}', 'UserController@update');
        Route::delete('/users/{id}', 'UserController@delete');
        Route::delete('/users', 'UserController@deletes');

        Route::post('/auth/login', 'AuthController@login');
        Route::post('/auth/refresh-token', 'AuthController@refresh');
        Route::group(['middleware' => AuthMiddleware::class], function () {
            Route::get('/auth/profile', 'AuthController@profile');
            Route::post('/auth/profile', 'AuthController@updateProfile');
            Route::get('/my-courses', 'UserController@courses');
            Route::post('/auth/logout', 'AuthController@logout');
        });
    });

});