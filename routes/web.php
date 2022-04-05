<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// HomeController untuk semua authenticated user
// GeneralController untuk semua user
// AdminController untuk user dengan role admin
// UserController untuk user dengan role user

Route::get('/', function () {
    return view('welcome');
})->name('landing-page');
// General Routes
Route::get('most-viewed', 'GeneralController@mostviewed')->name('most-viewed');
Route::get('category', 'GeneralController@category')->name('category');
Route::get('brand', 'GeneralController@brand')->name('brand');

Auth::routes();
// General Auth Routes
Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'HomeController@profile')->name('profile');
Route::get('setting', 'HomeController@setting')->name('setting');

// User Auth Routes
Route::get('favorite', 'UserController@favorite')->name('liked');
Route::get('status-lelang', 'UserController@status')->name('cart');

// Admin Auth Routes
Route::get('administrator', 'AdminController@liked')->name('administrator');

