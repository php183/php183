<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //
        $data = \DB::table('category')->select("*",\DB::raw("concat(path,',',id) AS sort_path"))->orderBy('sort_path')->get();
        foreach ($data as $key => $val) {
           $num = substr_count($val->path,',');
           $data[$key]->name = str_repeat('---|', $num).$data[$key]->name;
        }
        return view('admin.category.add',['title'=>'分类添加','data'=>$data]);
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
        // dd($request->all());
        $data = $request->except("_token");

        if($data['pid'] == 0){
            $data['path'] = 0;
            $data['status']=1;
        }else{
            // 查询父path
            $path = \DB::table('category')->where('id',$data['pid'])->first()->path;
            // dd($path);
            // 拼接数组
            $data['path'] = $parent_path.','.$data['pid'];
            $data['status']=1;
        }

        // 插入数据
        $res = \DB::table('category')->insert($date);

        if($res)
        {
            return redirect('/admin/category/create')->with(['info'=>'添加成功']);
        }else{
            return redirect('/admin/category/create')->with(['info'=>'添加失败']);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
