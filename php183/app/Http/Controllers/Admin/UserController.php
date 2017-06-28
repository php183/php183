<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //add
    public function add()
    {
    	return view('admin.user.add');
    }

    //insert
     public function insert(Request $request)
    {
    	$this->validate($request, [
        'name' => 'required|unique:users|min:6|max:18',
        'email'=>'email|unique:users',
        'password'=>'required',
        're_password'=>'required|same:password',
        'avatar'=>'required|image'
        ],[
        	'name.required'=>'用户名不能为空',
        	'name.unique'=>'用户名已存在',
        	'name.min'=>'用户最小6个字符',
        	'name.max'=>'用户不能超过18个字符',
        	'email.email'=>'请输入正确的邮箱，推荐使用新浪邮箱',
        	'email.unique'=>'邮箱已存在',
        	'password.required'=>'密码不能为空',
        	're_password.required'=>'确认密码不能为空',
        	're_password.same'=>'确认密码不一致',
        	'avatar.required'=>'你没有上传图片',
        	'avatar.image'=>'你上传的不是一张图片',


    	]);
    	$data = $request->except('_token','re_password');
    	// dd($data);
    	//处理图片上传
    	if($request->hasFile('avatar'))
    	{
    		if($request->file('avatar')->isValid())
    		{
    			//获取扩展名
    			$ext = $request->file('avatar')->extension();
    			//随机文件名
    			$filename = time().mt_rand(1000000,9999999).'.'.$ext;
    			//移动
    			$request->file('avatar')->move('./uploads/avatar',$filename);
    			//添加data数据
    			$data['avatar'] = $filename;
    		}
    	}
    	//处理token
    	$data['remember_token'] = str_random(50);
    	//处理时间
    	$time = date('Y-m-d H:i:s');
    	$data['created_at'] = $time;
    	$data['updated_at'] = $time;
    	// dd($data);

    	//执行添加
    	\DB::table('users')->insert(
    		$data
    	);
    	dd(111);
    }
}
