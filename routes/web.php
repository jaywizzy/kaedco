<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('tariff.master');
});

Route::group(['prefix' => 'Tariff'], function () {

    Route::get('/', 'TariffController@create')->name('get_tariff');
    Route::post('/', 'TariffController@store')->name('store_tariff');
    Route::get('/edit', 'TariffController@getEdit')->name('get_edit')
    Route::put('/edit', 'TariffController@update')->name('post_update');
});

Route::group(['prefix' => 'category'], function () {

    Route::get('/', 'CategoryController@create')->name('get_category');
    Route::post('/', 'CategoryController@store')->name('store_category');
});
