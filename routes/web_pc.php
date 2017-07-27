<?php

// 未登陆
Route::group(['namespace' => 'Pc', 'as' => 'pc::'], function () {
    Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);
    Route::get('/tv', ['as'=>'tvList', 'uses'=>'TvController@tv_list']);
    Route::get('/tv/{tv_id}', ['as'=>'tvInfo', 'uses'=>'TvController@tv_info']);
});

// 需要登陆
Route::group(['middleware' => ['auth:web'], 'namespace' => 'pc', 'as' => 'pc::'], function () {

});