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
    Route::get('/index', 'FeederController@index')->name('create_feeder');
    Route::get('/edit', 'BusinessController@update')->name('update_feeder');
    Route::get('/delete', 'BusinessController@remove')->name('delete_feeder');
});

Route::group(['prefix' => 'areaoffice'], function () {
	Route::get('/', 'AreaOfficeController@index')->name('get_area_office');
	Route::get('/create', 'AreaOfficeController@create')->name('create_area_office');
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
    Route::get('/{injection_nerc_code}', 'SubstationController@showEdit');
    Route::put('/editsubstation/{injection_nerc_code}', 'SubstationController@editsubstation');
});

Route::group(['prefix' => 'hightension'], function () {
    Route::get('/', 'HighTensionController@create')->name('get_hightension');
    Route::post('/', 'HighTensionController@store')->name('store_hightension');
});

Route::group(['prefix' => 'transformer'], function () {
	Route::get('/', 'TransformerController@create')->name('get_transformer');
	Route::post('/', 'TransformerController@store')->name('store_transformer');
});

Route::group(['prefix' => 'transformerbookcode'], function () {
    Route::get('/', 'TransformerBookCodeController@create')->name('get_transformer_bookcode');
    Route::post('/', 'TransformerBookCodeController@store')->name('store_transformerbookcode');

});

Route::group(['prefix' => 'ajaxcall'], function() {
    Route::post('/areaoffice', 'AjaxController@findSubstationByAreaNercCode')->name('ajax_areaoffice');
    Route::post('/substation', 'AjaxController@findTransformerByHighTension')->name('ajax_substation'); 
    Route::post('/feeder', 'AjaxController@findHightension')->name('ajax_feeder');
    Route::post('/hightension', 'AjaxController@findFeederBySubstation')->name('ajax_hightension');
});

