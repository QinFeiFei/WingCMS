<?php

Route::get('/', function () {
    return view('welcome');
});


// Admin Route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    Route::resource('tv', 'TvController');
});