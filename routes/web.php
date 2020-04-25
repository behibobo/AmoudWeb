<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@home');
Route::get('/about', 'HomeController@about');
Route::get('/gallery', 'HomeController@gallery');
Route::get('/projects', 'HomeController@projects');
Route::get('/categories/{slug}', 'HomeController@categories');

Route::group(['prefix' => 'admin'], function () {
    Route::middleware('auth')->group( function () {
        Route::resource('categories', 'CategoriesController');
        Route::resource('products', 'ProductsController');
        Route::post('storeImage', 'ProductsController@uploadImages');
        Route::post('deleteImage', 'ProductsController@deleteImage');
    });
});