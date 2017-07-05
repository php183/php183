<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});



// 路由群体
Route::group(['middleware' => 'adminlogin'],function(){

	// 后台主页
	Route::get('/admin/index','Admin\IndexController@index');
	// 用户管理
	Route::get('/admin/user/add','Admin\UserController@add');
	Route::post('/admin/user/insert','Admin\UserController@insert');
	Route::get('/admin/user/index','Admin\UserController@index');          
	Route::get('/admin/user/edit/{id}','Admin\UserController@edit');
	Route::get('/admin/user/update','Admin\UserController@edit');

	Route::get('/admin/user/delete/{id}','Admin\UserController@delete');

});



// 登录
Route::get('/admin/login', "Admin\LoginController@login");
Route::post('/admin/dologin', "Admin\LoginController@dologin");
Route::get('/admin/logout', "Admin\LoginController@logout");
// 验证码
Route::get('/kit/captcha/{tmp}', 'Admin\KitController@captcha');
// 发送邮件
Route::get('/send','Admin\MaidController@send');


// 前台登录
Route::get('/home/login', "Home\LoginController@login");
Route::post('/home/dologin', "Home\LoginController@dologin");


//前台注册
Route::get('/home/sign', "Home\SignController@sign");
Route::post('/home/sign/insert','Home\SignController@insert');


