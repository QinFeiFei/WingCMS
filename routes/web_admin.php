<?php

// 未登陆
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    // 登陆注销
    Route::post('login', ['as'=>'login', 'uses'=>'LoginController@login']);
    Route::post('logout', ['as'=>'logout', 'uses'=>'LoginController@logout']);
});

// 需要登陆
Route::group(['middleware' => ['auth:admin', 'jwt.refresh'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    // 获取登陆用户
    Route::get('getAdmin', ['as'=>'getAdmin', 'uses'=>'LoginController@getAdmin']);

    // 影视
    Route::resource('tv', 'TvController');
    Route::post('tv/setField', ['as'=>'tv.setField', 'uses'=>'TvController@setField']);
    Route::post('tv/uploadCover', ['as'=>'tv.uploadCover', 'uses'=>'TvController@uploadCover']);
    Route::delete('tv/delete', ['as'=>'tv.delete', 'uses'=>'TvController@delete']);

    // 用户管理
    Route::resource('user', 'UserController');
    Route::post('user/uploadAvatar', ['as'=>'tv.uploadAvatar', 'uses'=>'UserController@uploadAvatar']);
});