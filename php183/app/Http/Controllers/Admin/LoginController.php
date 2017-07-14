<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //Login
	public function login(){

		return view('admin.login.login');
	}

	public function dologin(Request $request)
	{
		$data = $request->except("_token");

		// 验证是否记住我
		$remember_token = \Cookie::get('remember_token');
		if($remember_token)
		{	$admin = \DB::table('user_t')->where('remember_token',$remember_token)->first();

		// 存入session
		session(['master' => $admin]);
			return redirect('/admin/index') -> with(['info' => '登陆成功']);
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
		
		// 跳转后台主页
		return redirect('/admin/index')->with(['info' => '登陆成功']);

	}

	// logout
	public function logout(Request $request)
	{
		$request->session()->forget('master');
		return redirect('/admin/login')->with(['info' => '退出成功']);
	}
}
