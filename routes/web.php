<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/',function(){
	return redirect('home');
});



##########laravel Redis 广播 START###########
//公共频道
 Route::any('/echo','EchoController@echo');
 Route::any('/push/{message}','EchoController@push');

//私有频道
Route::any('/privatepush/{message}/{id}','EchoController@privatepush');
// Route::any('/broadcasting/auth','EchoController@auth');
 //ps: 开启redis  开启队列 php artisan queue:listen 开启laravel-echo-server  laravel-echo-server start
####################END##################

