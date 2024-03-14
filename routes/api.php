<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

// Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('categories', 'App\Http\Controllers\CategoryController@getAll');
    Route::post('categories', 'App\Http\Controllers\CategoryController@create');
    Route::put('categories/{category}', 'App\Http\Controllers\CategoryController@update');
    Route::delete('categories/{category}', 'App\Http\Controllers\CategoryController@delete');

    Route::get('category/{category}/products', 'App\Http\Controllers\ProductController@getAll');
    Route::post('products', 'App\Http\Controllers\ProductController@create');
    Route::put('products/{product}', 'App\Http\Controllers\ProductController@update');
    Route::delete('products/{product}', 'App\Http\Controllers\ProductController@delete');

    Route::get('product/{product}/licenses', 'App\Http\Controllers\LicenseController@getAll');
    Route::post('licenses', 'App\Http\Controllers\LicenseController@create');
    Route::put('product/{product}/licenses', 'App\Http\Controllers\LicenseController@update');
    Route::delete('licenses/{license}', 'App\Http\Controllers\LicenseController@delete');
// });