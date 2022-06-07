<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// HomeController untuk semua authenticated user
// GeneralController untuk semua user
// AdminController untuk user dengan role admin
// UserController untuk user dengan role user
Auth::routes([
    'verify' => true
]);
// test data route
Route::get('test', 'Controller@test')->name('test');

// User Auth Routes
Route::get('favorite', 'UserController@favorite')->name('liked');

Route::get('profile/status-lelang', 'UserController@status')->name('cart');
Route::get('profile/status-lelang/{offer_code}', 'UserController@viewstatus')->name('view.cart');

Route::post('ikut-lelang', 'UserController@ikutlelang')->name('penawaran');

Route::get('cancel/{id}', 'UserController@canceloffer')->name('offer.cancel');

// General Routes
Route::get('/', 'GeneralController@landing')->name('page.landing');

Route::get('most-viewed', 'GeneralController@mostviewed')->name('most-viewed');

Route::get('tipe', 'GeneralController@category')->name('category');
Route::get('tipe/{name}', 'GeneralController@viewcategory')->name('view.category');

Route::get('brand', 'GeneralController@brand')->name('brand');
Route::get('brand/{name}', 'GeneralController@viewbrand')->name('view.brand');

Route::get('/profile/{username}', 'GeneralController@viewuser')->name('user.view');

Route::get('/item/{username}/{id_item}', 'GeneralController@viewitem')->name('item.view');

// General Auth Routes
// Route::get('home', 'HomeController@index')->name('home');

Route::get('profile', 'HomeController@profile')->name('profile');

Route::get('pengaturan', 'HomeController@setting')->name('setting');

Route::get('item/{username}/{id_item}/penawaran', 'HomeController@penawaran')->name('item.penawaran');

// Admin Auth Routes
Route::get('administrator', 'AdminController@dashboard')->name('admindashboard');
