<?php

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

Route::get('/', 'IndexController@index');

Route::get('/{slug}', 'IndexController@product');

Route::get('/retailer/{slug}', 'IndexController@retailer');

Route::post('/send-product/{slug}', 'IndexController@sendProduct');

Route::group(['prefix' => 'products'], function(){
    Route::get('/list', 'ProductsController@list');

    Route::get('/create', 'ProductsController@create');

    Route::post('/store', 'ProductsController@store');

    Route::get('/edit/{id}', 'ProductsController@edit');

    Route::post('/update/{id}', 'ProductsController@update');

    Route::get('/delete/{id}', 'ProductsController@delete');
});

Route::group(['prefix' => 'retailers'], function(){
    Route::get('/list', 'RetailersController@list');

    Route::get('/create', 'RetailersController@create');

    Route::post('/store', 'RetailersController@store');

    Route::get('/edit/{id}', 'RetailersController@edit');

    Route::post('/update/{id}', 'RetailersController@update');

    Route::get('/delete/{id}', 'RetailersController@delete');
});
