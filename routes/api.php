<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('registeruser', 'UserController@register');
Route::post('login', 'UserController@login');
Route::put('update/{id}', 'UserController@update');
Route::middleware('auth:sanctum')->post('logout', 'UserController@logout');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:api']).function(){
//     Route::get('home', [MainController::class, 'home']);
// };

Route::get('home', [MainController::class, 'home']);
Route::get('details/{id}', [MainController::class, 'detailproduct']);

Route::middleware('auth:sanctum')->get('cart', 'CartController@index');
Route::post('addtocart', [CartController::class, 'addcart']);


Route::middleware('auth:sanctum')->group(function () {
    // Route::get('cart', [CartController::class, 'index']);
});

// Route::group(['middleware' => 'auth:api', 'ceklevel:seller']).function(){
    Route::get('product', [BarangController::class, 'show']);
    Route::post('add-product',[BarangController::class, 'store']);
    Route::put('update-product/{id}',[BarangController::class, 'update']);
    Route::delete('delete-product/{id}',[BarangController::class, 'destroy']);

    Route::get('dashboard-seller', [MainController::class, 'dashboardseller']);

    Route::get('listcategory', [CategoryController::class, 'index']);
// };


// Route::group(['middleware' => 'auth', 'ceklevel:admin']).function(){
    Route::post('add-category', [CategoryController::class, 'createcategory']);

// };
