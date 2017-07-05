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

    // insert
    public function insert(Request $request)
    {

    	$this->validate($request, [
    		'name' => 'required|unique:user_t|min:6|max:18',
    		'email' => 'email|unique:user_t',
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
    	$time = date('Y-m-d H:i:s');
    	$data['created_at'] = $time;
    	$data['updated_at'] = $time;

    	// 执行添加
    	$res = \DB::table('user_t')->insert(
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
       $data = \DB::table('user_t')->where('name','like', '%'.$keywords.'%')->get();
       // dd($data);


       return view('admin.user.index',['num' => $num,'keywords'=> $keywords,'request' => $request->all(),'data' => $data]);
    }

    // edit
    public function edit($id){

        $data = \DB::table('user_t')->where('id',$id)->first();
        // dd($data);
        return view('admin.user.edit',['data' => $data]);
        // echo 111;

    }

    public function update(Request $request){

        $data = $require ->except('_token');

        // 查询老照片
    $user  =  \DB::table('user_t')->where('id',$data['id'])->first();
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
    
}
