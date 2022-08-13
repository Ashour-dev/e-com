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



Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
->namespace('admin')
->prefix('admin')
->name('admin.')
->group(function(){
    Route::get('/', function () {
        return view('admin.welcome');
    });
    // Route::get('/products', 'ProductController@index')->name('ProductsHome');
    // Route::get('/products/{product}', 'ProductController@show')->name('ProductsShow');
    // Route::get('/products/create', 'ProductController@create')->name('ProductsCreate');
    Route::resource('/products',"ProductController");

});

