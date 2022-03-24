<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'ceklevel:admin']],function () {

    Route::get('/index', 'AdminController@index');
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users/buyer', 'AdminController@createbuyer');
    Route::get('/users/seller', 'AdminController@createseller');
    Route::get('/users', 'AdminController@users');
    Route::post('/users/store', 'AdminController@storeuser');
    Route::get('/users/edit/{id}', 'AdminController@edituser');
    Route::post('/users/update/{id}', 'AdminController@updateuser');
    Route::delete('/users/delete/{id}', 'AdminController@deleteuser');

    Route::get('/barang/list', 'AdminController@barangs');
    Route::get('/barang/create', 'AdminController@createbarang');
    Route::post('/barang/store', 'AdminController@storebarang');
    Route::get('/barang/edit/{id}', 'AdminController@editbarang');
    Route::post('/barang/update/{id}', 'AdminController@updatebarang');
    Route::delete('/barang/delete/{id}', 'AdminController@deletebarang');

    Route::get('/category', 'AdminController@category');
    Route::get('/category/add', 'AdminController@addcategory');
    Route::post('/category/store', 'AdminController@storecategory');
    Route::get('/category/edit/{id}', 'AdminController@editcategory');
    Route::post('/category/update/{id}', 'AdminController@updatecategory');
    Route::delete('/category/delete/{id}', 'AdminController@deletecategory');


});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/error', 'AdminController@error');
