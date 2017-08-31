<?php

// 无需Token
Route::group(['namespace' => 'Pc', 'as' => 'pc::'], function () {
    Route::match(['get', 'post'], '/register', ['as'=>'register', 'uses'=>'LoginController@register']);
    Route::match(['get', 'post'], '/login', ['as'=>'login', 'uses'=>'LoginController@login']);
    Route::get('logout', ['as'=>'logout', 'uses'=>'LoginController@logout'])->middleware(['pc.jwt.token']);
    Route::match(['get', 'post'], '/findPassword', ['as'=>'findPassword', 'uses'=>'LoginController@findPassword']);
    Route::match(['get', 'post'], '/setPassword', ['as'=>'setPassword', 'uses'=>'LoginController@setPassword']);

    Route::get('/registerCheck', ['as'=>'registerCheck', 'uses'=>'LoginController@registerCheck']);
    Route::get('/register/declare', ['as'=>'declare', 'uses'=>'LoginController@reg_declare']);
    Route::get('/register/licence', ['as'=>'licence', 'uses'=>'LoginController@reg_licence']);
});


// 未登陆
Route::group(['middleware' => ['pc.jwt.token', 'pc.jwt.refresh'], 'namespace' => 'Pc', 'as' => 'pc::'], function () {
    // 首页
    Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);

    // 搜索页
    Route::get('/search', ['as'=>'search', 'uses'=>'SearchController@search']);

    // 错误页面
    Route::get('/404', ['as'=>'error404', 'uses'=>'IndexController@error404']);

    // 影视列表
    Route::get('/tvlist/{type}', ['as'=>'tvList', 'uses'=>'TvListController@index']);

    // 影视详情
    Route::get('/tvdetail/{type}/{tv_id}', ['as'=>'tvDetail', 'uses'=>'TvDetailController@index']);

    // 添加影视浏览记录
    Route::get('/addWatch/{tv_id}', ['as'=>'addWatch', 'uses'=>'TvController@addWatch']);
});


// 需要登陆
Route::group(['middleware' => ['pc.jwt.token', /*'auth:api',*/ 'pc.jwt.refresh'], 'namespace' => 'Pc', 'as' => 'pc::'], function () {
    Route::get('/user', ['as'=>'userIndex', 'uses'=>'UserController@index']);
    Route::match(['get', 'post'], '/user/editInfo', ['as'=>'userEditInfo', 'uses'=>'UserController@editInfo']);
    Route::match(['get', 'post'], '/user/editPassword', ['as'=>'userEditPassword', 'uses'=>'UserController@editPassword']);
    Route::match(['get', 'post'], '/user/bindPhone', ['as'=>'userBindPhone', 'uses'=>'UserController@bindPhone']);
    Route::match(['get', 'post'], '/user/bindEmail', ['as'=>'userBindEmail', 'uses'=>'UserController@bindEmail']);
    Route::post('/user/rebindEmail', ['as'=>'userReBindEmail', 'uses'=>'UserController@rebindEmail']);
    Route::post('/user/editAvatar/upload', ['as'=>'uploadAvatar', 'uses'=>'UserController@uploadAvatar']);
    Route::get('/user/editAvatar/save', ['as'=>'saveAvatar', 'uses'=>'UserController@saveAvatar']);
    Route::get('/user/editAvatar', ['as'=>'userEditAvatar', 'uses'=>'UserController@editAvatar']);
    Route::match(['get', 'post'], '/user/editOauth', ['as'=>'userEditOauth', 'uses'=>'UserController@editOauth']);

    Route::get('/user/collect', ['as'=>'collectList', 'uses'=>'UserCollectController@index']);
    Route::post('/user/collect/delete', ['as'=>'collectDelete', 'uses'=>'UserCollectController@delete']);
    Route::post('/user/collect/create', ['as'=>'collectCreate', 'uses'=>'UserCollectController@create']);

    Route::get('/user/watch', ['as'=>'watchList', 'uses'=>'UserWatchController@index']);
    Route::post('/user/watch/delete', ['as'=>'watchDelete', 'uses'=>'UserWatchController@delete']);
});