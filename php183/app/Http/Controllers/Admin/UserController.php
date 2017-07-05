<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Http\Kernel;


class UserController extends Controller
{
    //
=======

class UserController extends Controller
{
    //add
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
    public function add()
    {
    	return view('admin.user.add');
    }

<<<<<<< HEAD
    public function insert(Request $request)
    {
    	// dd($request -> all());
    	$this->validate($request, [
	        'name' => 'required|unique:users|min:6|max:18',
	        'email' => 'email|unique:users',
	        'password' => 'required',
	        're_password' => 'required|same:password',
	        'avatar' => 'required|image'
	        // 'body' => 'required',
	    ],[
	    	'name.required' => '用户名不能为空',
	    	'name.unique' => '用户名已存在',
	    	'name.min' => '用户名最少包含 6 个字符',
	    	'name.max' => '用户名不能超过18个字符',
	    	'email.email' => '请输入正确的邮箱,推荐使用新浪邮箱',
	   		'email.unique' => '邮箱已注册',
	   		'password.required' => '密码不能为空',
	   		're_password.required' => '确认密码不能为空',
	   		're_password.same' => '确认密码不一致',
	   		'avatar.required' => '您没有上传图片',
	   		'avatar.image' => '您上传的不是图片',
	    ]);


    	$data = $request -> except('_token','re_password');
    	//处理密码加密
	    // $data['password'] = encrypt($data['password']);

    	//hash加密
    	$data['password'] = \Hash::make($data['password']);
    	if(\Hash::check('123',$data['password']))
    	{
    		echo '密码正确';
    	}
    	//处理图片
    	if($request -> hasFile('avatar'))
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
    	//处理 token
    	$data['remember_token'] = str_random(50);
    	//处理时间
=======
    // insert
    public function insert(Request $request)
    {

    	$this->validate($request, [
    		'name' => 'required|unique:users|min:6|max:18',
    		'email' => 'email|unique:users',
    		'password' => 'required',
    		're_password' => 'required|same:password',
    		'avatar' => 'required'
    		],[
    		'name.required' => '用户名不能为空',
    		'name.unique' => '用户已经存在',
    		'name.min' => '用户名最小6个字符',
    		'name.max' => '用户名不能超过18个字符',
    		'email.email' => '请你输入正确的邮箱',

    		'email.unique' => '邮箱已经存在',
    		'password.required' => '密码不能为空',
    		're_password.required' => '确认密码不能为空',
    		're_password.same' => '确认密码不一致',
    		'avatar.required' => '你没有上传头像',
    		
    		]);

    	$data = $request->except('_token','re_password');

    	// 处理密码加密

    	$data['password'] = encrypt($data['password']);
    	// 处理图片
    	if($request->hasFile('avatar')){

    		if($request->file('avatar')->isValid())
    		{
    			// 获取扩展名
    			$ext = $request->file('avatar')->extension();
    			// 随机文件名
    			$filename = time().mt_rand(1000000,99999999).'.'.$ext;
    			// 移动
    			$request->file('avatar')->move('./uploads/avatar',$filename);

    			// 添加data数据
    			$data['avatar']= $filename;
    		}
    	}

    	// 处理 token
    	$data['remember_token'] = str_random(50);
    	// 处理时间
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
    	$time = date('Y-m-d H:i:s');
    	$data['created_at'] = $time;
    	$data['updated_at'] = $time;

<<<<<<< HEAD
    	//执行添加
    	$res = \DB::table('users')->insert(
		   $data
		);
		if($res)
		{
			return redirect('/admin/user/index?num=2&keywords=%&page=1')->with(['info'=>'添加成功'] );
		}else
		{
			return back()->with(['info'=>'添加失败']);
		}
    	// dd(111);
    }

    //用户列表
    public function index(Request $request)
    {

        $num = $request->num;
        $keywords = $request->keywords;
    	//查询数据库
       $data = \DB::table('users')->where('name','like','%'.$keywords.'%')->paginate($num);
       // dd($request->all());
       //给前台页面发送数据
       return view('admin.user.index',['request' => $request->all() , 'title'=>'用户列表' , 'data' => $data]);
       // return view('admin.user.index',['request' => $request->all() ,                       'data' => $data]);
    }
=======
    	// 执行添加
    	$res = \DB::table('users')->insert(
    		$data
    		);

    	if($res){

    		return redirect('/admin/user/index');
    	}else{

    		return back()->with(['info' => '添加失败']);
    	}

    }
    	// index
    public function index(Request $request){

        $num = $request->num;
        $keywords = $request->keywords;

    	//return '用户列表';
        // 查询数据库
       $data = \DB::table('users')->where('name','like', '%'.$keywords.'%')->get();
       // dd($data);


       return view('admin.user.index',['num' => $num,'keywords'=> $keywords,'request' => $request->all(),'data' => $data]);
    }

    // edit
    public function edit($id){

        $data = \DB::table('users')->where('id',$id)->first();
        // dd($data);
        return view('admin.user.edit',['data' => $data]);
        // echo 111;

    }

    public function update(Request $request){

        $data = $require ->except('_token');

        // 查询老照片
    $user  =  \DB::table('users')->where('id',$data['id'])->first();
        dd($user); 

        if($request->file('avatar')->isValid()){

            if($request->file('avatar')->isValid()){

                // 获取扩展名
                $ext = $request->file('avatar')->extension();
                // 随机文件名
                $filename = time().mt_rand(100000,9999999).'.'.$ext;
                // 移动
                $request->file('avatar')->move('./uploads/avatar',$filename);

                // 删除老照片
                if(file_exists('./uploads/avater/'.$oldAvatar) && $oldAvatar!= 'default.jpg'){
                    unlink('./uploads/avatar/'.$oldAvatar);
                }

                //添加 data 数据
                $data['avatar'] = $filename;

            }
        }    
    }
    
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
}
