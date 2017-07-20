<?php

Route::get('/', function () {

    return view('welcome');
});

// Admin Route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    Route::post('login', ['as'=>'login', 'uses'=>'LoginController@login']);
    Route::post('logout', ['as'=>'logout', 'uses'=>'LoginController@logout']);
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    Route::get('getAdmin', ['as'=>'getAdmin', 'uses'=>'LoginController@getAdmin']);

    Route::resource('tv', 'TvController');
    Route::post('tv/setField', ['as'=>'tv.setField', 'uses'=>'TvController@setField']);
    Route::post('tv/uploadCover', ['as'=>'tv.uploadCover', 'uses'=>'TvController@uploadCover']);
    Route::delete('tv/delete', ['as'=>'tv.delete', 'uses'=>'TvController@delete']);




});