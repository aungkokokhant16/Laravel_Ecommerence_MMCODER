<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'home page';
});


Route::get('admin/login', 'Admin\AuthController@showLogin');
Route::post('admin/login', 'Admin\AuthController@postLogin');

Route::group(['prefix' => 'admin', 'namespace' => "Admin", 'middleware' => "AdminCanRoute"], function () {
    Route::get('/', 'PageController@home');

    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('color', 'ColorController');
    Route::resource('size', 'SizeController');
});


Route::get('/no-authorize', function () {
    return 'no-authorize';
});


Route::get('/user/auth', function () {
    auth()->attempt(['email' => "userone@a.com", 'password' => 'password']);
    return auth()->user();
});

Route::get('/admin/auth', function () {
    auth()->attempt(['email' => "admin@a.com", 'password' => 'password']);
    return auth()->user();
});

Route::get('/logout', function () {
    auth()->logout();
    return 'logout';
});
