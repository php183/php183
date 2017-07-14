<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        // dd(123);
        // 查询数据库
        $data = \DB::table('goods_sel_t')->get();
        // dd($data);
        return view('admin.sellers.index',['info'=>'商铺管理','data' => $data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sellers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($_POST);
        // 去除_token
        $data = $request->except('_token');

        // 处理图片 
        if($request->hasFile('picture')){

            if($request->file('picture')->isValid())
            {
                // 获取扩展名
                $ext = $request->file('picture')->extension();
                // 随机文件名
                $filename = time().mt_rand(1000000,99999999).'.'.$ext;
                // 移动
                $request->file('picture')->move('./uploads/sellers',$filename);

                // 添加data数据
                $data['picture']= $filename;
            }
        }

        $res = \DB::table('goods_sel_t')->insert($data);
        if($res)
        {
            return redirect('/admin/sellers/index')->with(['info'=>'添加成功']);
        }else{
            return redirect('/admin/sellers/add')->with(['info'=>'添加失败']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = \DB::table('goods_sel_t')->where('id',$id)->first();
        // dd($data);
        return view('admin.sellers.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // dd(111);
        // dd($request);
        $this->validate($request, [
            'picture' => 'required'
            ],[
            'picture.required' => '你没有上传图片',
            ]);
        $data= $request->except('_token');

        // 查询老照片
        $sellers  =  \DB::table('goods_sel_t')->where('id',$data['id'])->first();

        if($request->file('picture')->isValid()){

            if($request->file('picture')->isValid()){

                // 获取扩展名
                $ext = $request->file('picture')->extension();
                // 随机文件名
                $filename = time().mt_rand(100000,9999999).'.'.$ext;
                // 移动
                $request->file('picture')->move('./uploads/sellers',$filename);

                // 删除老照片
                // if(file_exists('./uploads/sellers/'.$oldAvatar) && $oldAvatar!= 'default.jpg'){
                //     unlink('./uploads/avatar/'.$oldAvatar);
                }

                //添加 data 数据
                $data['picture'] = $filename;

            }
            // dd($data);
            $id = $data['id'];
           // $data= $request->except('id');
            // dd($id);
            // dd($data);
        $res = \DB::table('goods_sel_t')->where('id',$id)->update($data);
        if($res)
        {
            return redirect('/admin/sellers/index')->with(['info'=>'添加成功']);
        }else{
            return redirect('/admin/sellers/add')->with(['info'=>'添加失败']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        // dd($id);
        $res = \DB::table('goods_sel_t')->delete($id);
        if($res)
        {
            return redirect('/admin/sellers/index')->with(['info'=>'添加成功']);
        }else{
            return redirect('/admin/sellers/index')->with(['info'=>'添加失败']);
        }
    }
}
