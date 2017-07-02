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
//Route 类	get 请求方法	view函数(用来解析模板)
Route::get('/', function () {
    return view('welcome');
});

//后台主页
Route::get('/admin/index','Admin\IndexController@index');
Route::get('/admin/user/add','Admin\UserController@add');

//用户管理
Route::post('/admin/user/insert','Admin\UserController@insert');
Route::get('/admin/user/index','Admin\UserController@index');

//分类管理
Route::resource('/admin/category','Admin\CategoryController');