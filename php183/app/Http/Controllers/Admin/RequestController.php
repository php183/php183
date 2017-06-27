<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function add(){
    	
    	return view ('request.form');
    }

    public function insert(Request $request){

    		// $name = $request->input('name');

    		// echo  $name;

    		// $age = \Request::input('age');
    		// echo $age;

    		// // return $request -> path();

    		// dd($request);

    	// $res = $request->is('request/*');
    	// dd($res);

    	// $res = $request->url();
    	// dd($res);

    	// echo 1;

    	// return 1;

    	// $res = $request ->fullUrl();

    	// return $res;

    	// $res = $request->method();
    	// $res = $request->isMethod("GET");

    	// $res = $request ->all();

    	// $res = $request ->input('aaa','res');

    	// $res = $request ->name;

    	// $res = $request ->only(['age','name']);

    	// $res = $request ->only('name','height');

    	// $res = $request ->except('_token');

    	// if($request->has('bog')){
    	// 	echo 11;
    	// }else{
    	// 	echo 22;
    	// }

    	// $request ->flash();

    	// $request ->flashOnly(['name','age']);
    	// $request ->flashExcept(['name','age']);

    	// return redirect('/request/add');

    	// 缓存到session中
    	// return redirect('/request/add')->withInput($request->except('name'));
    	
    		// return response('hello world')->cookie('age','zs',10);

    	// return response('hello world')->cookie('age','value',10);

    	// 更简单的cookie生成方式

    	  // \Cookie::queue('width',18,10);

    	// $res 获取cookie的值
    	// $res = $request ->cookie('book',20,10);

    	// dd($res);
    	// $file = $request->file('img');

    	// // 原始文件后缀名
    	// $extension = $request->img->getClientOriginalExtension();

    	// $filename =time().'.'.$extension;

    	// $request->img->move('./upload',$filename);

    	// dd($extension);	

    	// 响应session
    	// return redirect('/request/add')->with('status', 'Profile updated!');

    	// return back();



    }

    // 响应
    public function response(Request $request){

    		// return view('request.form');
    		// \Cookie::queue('name','nn',19);
		  //   		return response()->json([
			 //    'name' => 'Abigail',
			 //    'state' => 'CA'
				// ]);

    		$pathToFile = './upload/1498488505.jpeg';
		   return response()->download($pathToFile);


    } 

    public function login(Request $request){

    		return '登陆成功';
    }
}
