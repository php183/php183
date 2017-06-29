<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    //
    public function add()
    {
    	return view('request.form');
    }
    public function insert(Request $request)
    {
    	// $name = $request -> input('name');
    	// echo $name;

    	// $path = $request -> path();
    	// $res = $request -> is('request/insert');

    	// $res = $request -> url();
    	// $res = $request -> fullUrl();
    	
    	//获取请求方法
    	// $method = $request  -> method();
    	// $res = $request -> isMethod('post');

    	//获取所有输入数据
    	// $res = $request -> all();
    	// $res = $request -> input('name');
    	//不存在此字段时生效
    	// $res = $request -> input('name','zhangsan');
    	// $res = $request -> input('products.0.name');

    	//获取部分输入数据
    	// $res = $request -> only('name');
    	// $res = $request -> except('name');

    	//判断是否有输入值
    	// $res = $request -> has('sex');

    	//旧输入数据
    	//将输入数据村道session中
    	// $request -> flash();
    	// $request -> flashOnly('name','pass');
    	// $request -> flashExcept('name');

    	//闪存输入数据到session后重定向

  		//return redirect('/request/add')->withInput(
		//     $request->only('name')
		// );
		// $res = $request -> old('name');
		// return response('Hello World')->cookie(
		//     'sex', '111', 10
		// );
		// $res = $request -> cookie('sex');

		//获取上传文件
		// $res = $request -> file('img');
		// $res = $request -> img;

		//判断文件是否上传
		// $res = $request -> hasFile('img');

		//确认上传的文件是否有效
		// $res = $request -> file('img') -> isValid();

		//文件路径及拓展 
		// $res = $request -> img -> path();
		// $res = $request -> img -> extension();

		//储存上传文件
		// $res = $request -> img -> store('images');
		//这个方法不能用 是国外的
		// $res = $request -> img -> store('images','s3');
    	echo 11;
    	// dd($res);
    }

    public function response(Request $request)
    {
    	// return back() -> withInput();
    	// echo 111;
    	return redirect()->route('request/aaa');
    }
}
