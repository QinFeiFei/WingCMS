<?php

Route::get('/', function () {

    return view('welcome');
});

// Admin Route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    Route::post('login', ['as'=>'login', 'uses'=>'LoginController@login']);
    Route::post('logout', ['as'=>'logout', 'uses'=>'LoginController@logout']);
});

Route::group(['middleware' => ['api', 'jwt.auth'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    Route::resource('tv', 'TvController');
    Route::post('setField', ['as'=>'tv.setField', 'uses'=>'TvController@setField']);
    Route::post('uploadCover', ['as'=>'tv.uploadCover', 'uses'=>'TvController@uploadCover']);
});