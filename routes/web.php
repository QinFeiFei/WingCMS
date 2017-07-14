<?php

Route::get('/', function () {
    return view('welcome');
});


// Admin Route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    Route::resource('tv', 'TvController');
    Route::post('setField', ['as'=>'tv.setField', 'uses'=>'TvController@setField']);
    Route::post('uploadCover', ['as'=>'tv.uploadCover', 'uses'=>'TvController@uploadCover']);
});