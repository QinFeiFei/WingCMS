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
    Route::get('/404', ['as'=>'error404', 'uses'=>'IndexController@index']);

    // 影视列表
    Route::get('/tvlist/movie', ['as'=>'movieList', 'uses'=>'TvListController@movieList']);
    Route::get('/tvlist/teleplay', ['as'=>'teleplayList', 'uses'=>'TvListController@teleplayList']);
    Route::get('/tvlist/cartoon', ['as'=>'cartoonList', 'uses'=>'TvListController@cartoonList']);
    Route::get('/tvlist/variety', ['as'=>'varietyList', 'uses'=>'TvListController@varietyList']);
    Route::get('/tvlist/mv', ['as'=>'mvList', 'uses'=>'TvListController@mvList']);
    Route::get('/tvlist/openclass', ['as'=>'openclassList', 'uses'=>'TvListController@openclassList']);
    Route::get('/tvlist/other', ['as'=>'otherList', 'uses'=>'TvListController@otherList']);

    // 影视详情
    Route::get('/tvdetail/movie/{tv_id}', ['as'=>'movieDetail', 'uses'=>'TvDetailController@movieDetail']);
    Route::get('/tvdetail/teleplay/{tv_id}', ['as'=>'teleplayDetail', 'uses'=>'TvDetailController@teleplayDetail']);
    Route::get('/tvdetail/cartoon/{tv_id}', ['as'=>'cartoonDetail', 'uses'=>'TvDetailController@cartoonDetail']);
    Route::get('/tvdetail/variety/{tv_id}', ['as'=>'varietyDetail', 'uses'=>'TvDetailController@varietyDetail']);
    Route::get('/tvdetail/mv/{tv_id}', ['as'=>'mvDetail', 'uses'=>'TvDetailController@mvDetail']);
    Route::get('/tvdetail/openclass/{tv_id}', ['as'=>'openclassDetail', 'uses'=>'TvDetailController@openclassDetail']);
    Route::get('/tvdetail/other/{tv_id}', ['as'=>'otherDetail', 'uses'=>'TvDetailController@otherDetail']);
});


// 需要登陆
Route::group(['middleware' => ['pc.jwt.token', /*'auth:api',*/ 'pc.jwt.refresh'], 'namespace' => 'pc', 'as' => 'pc::'], function () {
    Route::get('/user', ['as'=>'userIndex', 'uses'=>'UserController@index']);
    Route::match(['get', 'post'], '/user/editInfo', ['as'=>'userEditInfo', 'uses'=>'UserController@editInfo']);
    Route::match(['get', 'post'], '/user/editPassword', ['as'=>'userEditPassword', 'uses'=>'UserController@editPassword']);
    Route::match(['get', 'post'], '/user/bindPhone', ['as'=>'userBindPhone', 'uses'=>'UserController@bindPhone']);
    Route::match(['get', 'post'], '/user/bindEmail', ['as'=>'userBindEmail', 'uses'=>'UserController@bindEmail']);
    Route::post('/user/rebindEmail', ['as'=>'userReBindEmail', 'uses'=>'UserController@rebindEmail']);
    Route::match(['get', 'post'], '/user/editAvatar', ['as'=>'userEditAvatar', 'uses'=>'UserController@editAvatar']);
    Route::match(['get', 'post'], '/user/editOauth', ['as'=>'userEditOauth', 'uses'=>'UserController@editOauth']);
});