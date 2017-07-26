<?php

// 未登陆
Route::group(['prefix' => 'wap', 'namespace' => 'Pc', 'as' => 'pc::'], function () {
    Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);
});

// 需要登陆
Route::group(['prefix' => 'wap', 'middleware' => ['auth:web'], 'namespace' => 'pc', 'as' => 'pc::'], function () {

});