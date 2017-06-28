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


Route::get("/mytest",function(){

	return "你好";
});

Route::get("/form",function(){
	return view("form");
});

Route::post("/test",function(){

	return "你坏";
});
Route::put("/test",function(){

	return "你顽强";
});
Route::delete("/test",function(){

	return "delete";
});

// Route::get('/php',function(){
// 	return "这是GET php";
// });

// Route::get('/php',function(){
// 	return "这是POST php";
// });

Route::match(['get','post'],'/php',function(){

		return '这是GET+POST';
});

Route::any('/php',function(){
	return '这是any请求';
});

Route::get("/news/{id?}/{name?}",function($id="aa",$name="ccc"){

	return $id."<br/>".$name;
});


// Route::get('/mycontro','TestController@index');
Route::get('/home/mycontro','Home\TestController@index');


Route::get("/form",function(){
	return view("form");
});
Route::resource('/stu','StuController');

Route::get('/stu/a/b/c','StuController@myfunc');
Route::resource('/stu','StuController',['only'=>['index','show']]);

Route::get('/request/add','Admin\RequestController@add');
Route::post("/request/insert",'Admin\RequestController@insert');

Route::get('/response','Admin\RequestController@response');

Route::post('/login','Admin\RequestController@login')->middleware('login');

Route::get('/view',function(){

	return view('request.view')->with('name','vator');
});

Route::get('/home',function(){

	session(['name'=>'boy']);

	$value = session('name');
	var_dump($value);
});