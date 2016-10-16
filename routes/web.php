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

Route::group(['prefix' => 'tariff'], function () {

    Route::get('/', 'TariffController@create')->name('get_tariff');
    Route::post('/', 'TariffController@store')->name('store_tariff');
    Route::get('/edit', 'TariffController@getEdit')->name('get_edit');
    Route::put('/edit', 'TariffController@update')->name('post_update');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@create')->name('get_category');
    Route::post('/', 'CategoryController@store')->name('store_category');
});

Route::group(['prefix' => 'feeder'], function () {
	Route::get('/', 'FeederController@create')->name('get_feeder');
	Route::post('/', 'FeederController@store')->name('store_feeder');
});

Route::group(['prefix' => 'area-office'], function () {
	Route::get('/', 'AreaOfficeController@create')->name('get_area_office');
	Route::post('/', 'AreaOfficeController@store')->name('store_area_office');
});

Route::group(['prefix' => 'settings'], function () {
	Route::get('/', 'SettingController@create')->name('get_setting');
	Route::post('/', 'SettingController@store')->name('store_setting');
});

Route::group(['prefix' => 'bookcode'], function () {
	Route::get('/', 'BookCodeController@create')->name('get_bookcode');
	Route::post('/', 'BookCodeController@store')->name('store_bookcode');
});


Route::group(['prefix' => 'substation'], function () {
    Route::get('/', 'SubstationController@create')->name('get_subsection');
    Route::post('/', 'SubstationController@store')->name('store_substation');
});


Route::group(['prefix' => 'hightension'], function () {
    Route::get('/', 'HighTensionController@create')->name('get_hightension');
    Route::post('/', 'HighTensionController@store')->name('store_hightension');

});


Route::group(['prefix' => 'Transformer'], function () {
	Route::get('/', 'TransformerController@create')->name('get_transformer');
	Route::post('/', 'TransformerController@store')->name('store_transformer')
});
