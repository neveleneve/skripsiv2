<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// HomeController untuk semua authenticated user
// GeneralController untuk semua user
// AdminController untuk user dengan role admin
// UserController untuk user dengan role user

Route::get('/', 'GeneralController@landing')->name('landing-page');
// General Routes
Route::get('most-viewed', 'GeneralController@mostviewed')->name('most-viewed');
Route::get('tipe', 'GeneralController@category')->name('category');
Route::get('brand', 'GeneralController@brand')->name('brand');
Route::get('/item/{username}/{id_item}', 'GeneralController@viewitem')->name('item.view');
Route::get('/profile/{username}', 'GeneralController@viewuser')->name('user.view');

Auth::routes();
// General Auth Routes
Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'HomeController@profile')->name('profile');
Route::get('pengaturan', 'HomeController@setting')->name('setting');
Route::get('{username}/{id_item}/penawaran', 'HomeController@penawaran')->name('item.penawaran');

// User Auth Routes
Route::get('favorite', 'UserController@favorite')->name('liked');
Route::get('status-lelang', 'UserController@status')->name('cart');
Route::get('status-lelang/{offer_code}', 'UserController@viewstatus')->name('view.cart');

// Admin Auth Routes
Route::get('administrator', 'AdminController@dashboard')->name('admindashboard');
