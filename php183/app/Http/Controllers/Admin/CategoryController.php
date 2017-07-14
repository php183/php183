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
        $data = \DB::table('goods_cat_t')->select("*",\DB::raw("concat(cid,',',id) AS sort_cid"))->orderBy('sort_cid')->get();
        // dd($data);
        foreach ($data as $key => $val) {
           $num = substr_count($val->cid,',');
           $data[$key]->name = str_repeat('|---', $num).$data[$key]->name;
        }
        return view('admin.category.index',['title'=>'分类管理','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //
        $data = \DB::table('goods_cat_t')->select("*",\DB::raw("concat(cid,',',id) AS sort_cid"))->orderBy('sort_cid')->get();
        // dd($data);
        foreach ($data as $key => $val) {
           $num = substr_count($val->cid,',');
           $data[$key]->name = str_repeat('---|', $num).$data[$key]->name;
        }
        // dd($data);
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
            $data['cid'] = 0;
            $data['status']=1;
        }else{
            // 查询父cid
            $parent_cid = \DB::table('goods_cat_t')->where('id',$data['pid'])->first()->cid;
            // dd($cid);
            // 拼接数组
            $data['cid'] = $parent_cid.','.$data['pid'];
            $data['status']=1;
        }


        // 插入数据
        $res = \DB::table('goods_cat_t')->insert($data);

        if($res)
        {
            return redirect('/admin/category/index')->with(['info'=>'添加成功']);
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
        // echo $id;
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
        $allData = \DB::table('goods_cat_t')->select("*",\DB::raw("concat(cid,',',id) AS sort_cid"))->orderBy('sort_cid')->get();
        // dd($data);
        foreach ($allData as $key => $val) {
           $num = substr_count($val->cid,',');
           $allData[$key]->name = str_repeat('---|', $num).$allData[$key]->name;
        }

        $data = \DB::table('goods_cat_t')->where('id',$id)->first();

        return view('admin.category.edit',['title'=>'分类编辑','data'=>$data,'allData'=>$allData]);
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
        //去除_token,_method
        $data = $request->except('_token','_method');

        //判断
        if($data['pid'] == 0){
            $data['cid'] = 0;
            $data['status']=1;
        }else{
            // 查询父cid
            $parent_cid = \DB::table('goods_cat_t')->where('id',$data['pid'])->first()->cid;
            // dd($cid);
            // 拼接数组
            $data['cid'] = $parent_cid.','.$data['pid'];
            $data['status']=1;
        }
        // 修改数据
        $res = \DB::table('goods_cat_t')->where('id',$id)->update($data);
        // 判断是否修改成功
        if($res)
        {
            return redirect('/admin/category/index')->with(['info'=>'修改成功']);
        }else{
            return back()->with(['info'=>'修改失败']);
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
       $res = \DB::table('goods_cat_t')->where('id',$id)->delete();
       if($res)
        {
            return redirect('/admin/category/index')->with(['info'=>'删除成功']);
        }else{
            return back()->with(['info'=>'删除失败']);
        }
    }
}
