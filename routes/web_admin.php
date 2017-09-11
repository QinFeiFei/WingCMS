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

    Route::get('tvClass', ['as'=>'tv.classList', 'uses'=>'TvController@classList']);
    Route::get('tvClass/{tv_class_id}', ['as'=>'tv.classShow', 'uses'=>'TvController@classShow']);
    Route::post('tvClass', ['as'=>'tv.classInsert', 'uses'=>'TvController@classInsert']);
    Route::delete('tvClass/{tv_class_id}', ['as'=>'tv.classDelete', 'uses'=>'TvController@classDelete']);
    Route::patch('tvClass/{tv_class_id}', ['as'=>'tv.classUpdate', 'uses'=>'TvController@classUpdate']);

    // 用户管理
    Route::resource('user', 'UserController');
    Route::post('user/uploadAvatar', ['as'=>'tv.uploadAvatar', 'uses'=>'UserController@uploadAvatar']);

    // PC端
    Route::get('pc/clearCache', ['as'=>'tv.clearCache', 'uses'=>'PcController@clearCache']);   // 首页缓存清理
    Route::resource('banner', 'BannerController');
    Route::post('banner/upload', ['as'=>'tv.bannerUpload', 'uses'=>'BannerController@upload']);

    // 设置
    Route::get('setting/emailTest', ['as'=>'setting.emailTest', 'uses'=>'SettingController@emailTest']);
});