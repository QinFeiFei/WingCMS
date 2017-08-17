<?php

Route::get('/home', 'HomeController@index')->name('home');


Route::send('/sendEmail/{type}', ['as'=>'sendEmail', 'uses'=>'']);