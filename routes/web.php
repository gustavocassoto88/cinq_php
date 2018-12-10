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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'products'], function(){
    Route::get('/list', 'ProductsController@list');

    Route::get('/create', 'ProductsController@create');

    Route::post('/store', 'ProductsController@store');

    Route::get('/edit/{id}', 'ProductsController@edit');

    Route::post('/update/{id}', 'ProductsController@update');

    Route::get('/change-status/{id}', 'ProductsController@changeStatus');

    Route::get('/delete/{id}', 'ProductsController@delete');
});

Route::group(['prefix' => 'retailers'], function(){
    Route::get('/list', 'RetailersController@list');

    Route::get('/create', 'RetailersController@create');

    Route::post('/store', 'RetailersController@store');

    Route::get('/edit/{id}', 'RetailersController@edit');

    Route::post('/update/{id}', 'RetailersController@update');

    Route::get('/change-status/{id}', 'RetailersController@changeStatus');

    Route::get('/delete/{id}', 'RetailersController@delete');
});
