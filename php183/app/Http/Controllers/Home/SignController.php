<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignController extends Controller
{
    //引入注册页面
    public function sign(){

    	//echo '1111';

    	return view('home.sign.sign');
    }

    public function insert(Request $request){
    		
    	$data = $request->except("_token");

    	$this->validate($request, [
    		'name' => 'required|unique:user_t|min:6|max:18',
    		'password' => 'required',
    		'password1' => 'required|same:password',
    		
    		],[
    		'name.required' => '用户名不能为空',
    		'name.unique' => '用户已经存在',
    		'name.min' => '用户名最小6个字符',
    		'name.max' => '用户名不能超过18个字符',
    		'password.required' => '密码不能为空',
    		'password1.required' => '确认密码不能为空',
    		'password1.same' => '确认密码不一致',
    		
    		
    		]);



    	$data = $request->except('_token','password1');

    	// 处理密码加密

    	$data['password'] = encrypt($data['password']);


    	// 处理 token
    	$data['remember_token'] = str_random(50);
    	// 处理时间
    	$time = date('Y-m-d H:i:s');
    	$data['created_at'] = $time;
    	$data['updated_at'] = $time;

    	// 执行添加
    	$res = \DB::table('user_t')->insert(
    		$data
    		);
   

    	if($res){

    		return redirect('/home/login')->with(['info' => '恭喜你,注册成功']);
    	}else{

    		return back()->with(['info' => '添加失败']);
    	}
    	
    }
}
