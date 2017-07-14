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


	// 后台主页
	Route::get('/admin/index','Admin\IndexController@index');
	// 用户管理
	Route::get('/admin/user/add','Admin\UserController@add');
	Route::post('/admin/user/insert','Admin\UserController@insert');
	Route::get('/admin/user/index','Admin\UserController@index');          
	Route::get('/admin/user/edit/{id}','Admin\UserController@edit');
	Route::get('/admin/user/update','Admin\UserController@edit');

	Route::get('/admin/user/delete/{id}','Admin\UserController@delete');


	// 分类模块
	Route::get('/admin/category/index','Admin\CategoryController@index');
	Route::get('/admin/category/add','Admin\CategoryController@create');
	Route::get('/admin/category/edit/{id}','Admin\categoryController@edit');
	Route::get('/admin/category/delete/{id}','Admin\categoryController@delete');
	Route::post('/admin/category/store','Admin\CategoryController@store');
	Route::post('/admin/category/update','Admin\CategoryController@update');

	// 商家管理
	Route::get('/admin/sellers/index','Admin\SellersController@index');
	Route::get('/admin/sellers/add','Admin\SellersController@create');
	Route::post('/admin/sellers/store','Admin\SellersController@store');
	Route::get('/admin/sellers/edit/{id}','Admin\SellersController@edit');
	Route::post('/admin/sellers/update','Admin\SellersController@update');
	Route::get('/admin/sellers/delete/{id}','Admin\SellersController@delete');
	// Route::resource('/admin/sellers','Admin\SellersController@index');
	// 商品管理
	Route::get('/admin/goods/index','Admin\GoodsController@index');
	Route::get('/admin/goods/add','Admin\GoodsController@create');
	Route::post('/admin/goods/insert','Admin\GoodsController@insert');
	Route::get('/admin/goods/ima/{id}','Admin\GoodsController@ima');
	Route::get('/admin/goods/att/{id}','Admin\GoodsController@att');
	Route::get('/admin/goods/mess/{id}','Admin\GoodsController@mess');
	Route::post('/admin/goods/mass','Admin\GoodsController@mass');
	Route::post('/admin/goods/atta','Admin\GoodsController@atta');
	Route::get('/admin/goods/attb/{id}','Admin\GoodsController@attb');
	Route::post('/admin/goods/attc','Admin\GoodsController@attc');
	Route::post('/admin/goods/imag','Admin\GoodsController@imag');
	Route::get('/admin/goods/edit/{id}','Admin\GoodsController@edit');
	Route::post('/admin/goods/update','Admin\GoodsController@update');
	Route::get('/admin/goods/delete/{id}','Admin\goodsController@delete');


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


