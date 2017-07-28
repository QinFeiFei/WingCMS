<?php

// 未登陆
Route::group(['namespace' => 'Pc', 'as' => 'pc::'], function () {
    // 首页
    Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);

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

    // 登陆 / 注册 / 找回密码
    Route::get('/register', ['as'=>'register', 'uses'=>'LoginController@register']);
    Route::get('/login', ['as'=>'login', 'uses'=>'LoginController@login']);
    Route::get('/findPassword', ['as'=>'findPassword', 'uses'=>'LoginController@findPassword']);
});

// 需要登陆
Route::group(['middleware' => ['auth:web'], 'namespace' => 'pc', 'as' => 'pc::'], function () {

});