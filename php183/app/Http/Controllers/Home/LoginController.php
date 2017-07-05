<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login(){
    	

    	return view('home.login.login');
    	
    }

    public function dologin(Request $request)
	{
		$data = $request->except("_token");


		// 验证是否记住我
		$remember_token = \Cookie::get('remember_token');
		if($remember_token)
		{	$home = \DB::table('user_t')->where('remember_token',$remember_token)->first();

		// 存入session
		session(['master' => $home]);
			return redirect('/home/sign') -> with(['info' => '登陆成功']);
		}

		// 验证码是否正确
		$code = session('code');

		if($code !== $data['code'])
		{
			return back()->with(['info' => '验证码错误']);
		}
	
		// 查询用户
		$user = \DB::table('user_t')->where('name',$data['name'])->first();
		
		// 判断
		if(!$user)
		{
			return back()->with(['info' => '该用户不存在']);
		}

		// 对密码解密
		$password = decrypt($user->password);
		if($password != $data['password'])
		{
			return back()->with(['info' => '用户名或密码错误']);
		}

		// 将用户数据存入 session
		session(['master' => $user]);

		// 写入 cookie
		if($request->has('remember_me')){
			\Cookie::queue('remember_me',$user->remember_token,10);
		}
		
		// 跳转前台主页
		return redirect('/home/sign')->with(['info' => '登陆成功']);

	}

}
