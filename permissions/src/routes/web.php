<?php

use App\Middlewares\AuthMiddleware;
use Pecee\SimpleRouter\SimpleRouter as Route;

Route::group(['middleware' => AuthMiddleware::class], function () {
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
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index')->name('posts.index');
        Route::get('/add', 'PostController@add')->name('posts.add');
        Route::post('/add', 'PostController@handleAdd');
        Route::get('/edit/{id}', 'PostController@edit')->name('posts.edit');
        Route::post('/edit/{id}', 'PostController@update');
        Route::post('/delete/{id}', 'PostController@delete')->name('posts.delete');
    });

    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', 'PermissionController@index')->name('permissions.index');
        Route::get('/add', 'PermissionController@add')->name('permissions.add');
        Route::post('/add', 'PermissionController@handleAdd');
        Route::get('/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
        Route::post('/edit/{id}', 'PermissionController@update');
        Route::post('/delete/{id}', 'PermissionController@delete')->name('permissions.delete');

        Route::post('/update-user-role', 'UserPermissionController@updateUserRolePermission')->name('permissions.user_role_permission');

        Route::get('/data/roles/{id}', 'UserPermissionController@getDataRoles')->name('permissions.data.roles');
        Route::get('/data/permissions/{id}', 'UserPermissionController@getDataPermissions')->name('permissions.data.permissions');
    });

});
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'Auth\LoginController@login')->name('auth.login');
    Route::post('/login', 'Auth\LoginController@handleLogin');
});
