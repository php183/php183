<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
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
        $data = \DB::table('goods_t')->get();
        return view('admin.goods.index',['title'=>'分类添加','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create() 
    {
        //
    
        $data = \DB::table('goods_cat_t')->get();
        $date = \DB::table('goods_sel_t')->get();
        // dd($data);
        // dd($date);
        return view('admin.goods.add',['title'=>'分类添加','data'=>$data,'date'=>$date]);
        
    }

    public function insert(Request $request)
        {
            // 
            $data = $request->except("_token");
            // dd($data);
            $res = \DB::table('goods_t')->insert($data);
            if($res)
            {
                return redirect('/admin/goods/index')->with(['info'=>'添加成功']);
            }else{
                return redirect('/admin/goods/add')->with(['info'=>'添加失败']);
            }

        
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function ima(Request $request, $id)
    {
        //
        // echo $id;
        $data = \DB::table('goods_t')->where('id',$id)->get();
        $date = \DB::table('goods_att_t')->where('gid',$id)->get();
        return view('admin.goods.ima',['title'=>'分类编辑','data'=>$data,'date'=>$date]);

    }

    public function imag(Request $request)
    {
        //
        // echo $id;
        $data = $request->except("_token");

        if($request->hasFile('picture')){

            if($request->file('picture')->isValid())
            {
                // 获取扩展名
                $ext = $request->file('picture')->extension();
                // 随机文件名
                $filename = time().mt_rand(1000000,99999999).'.'.$ext;
                // 移动
                $request->file('picture')->move('./uploads/picture',$filename);

                // 添加data数据
                $data['picture']= $filename;
            }
        }

        $res = \DB::table('goods_pic_t')->insert($data);
            if($res)
            {
                return redirect('/admin/goods/index')->with(['info'=>'添加成功']);
            }else{
                return redirect('/admin/goods/index')->with(['info'=>'添加失败']);
            }
    }

    public function att(Request $request, $id)
    {
        //
        // echo $id;
        $data = \DB::table('goods_t')->where('id',$id)->get();
        // dd($data);
        return view('admin.goods.att',['title'=>'分类添加','data'=>$data]);

    }


    public function atta(Request $request)
    {
        //
         $data = $request->except("_token");
         // dd($data);
        $res = \DB::table('goods_att_t')->insert($data);
            if($res)
            {
                $date = \DB::table('goods_att_t')->where('id',$data['gid'])->get();
             
               // foreach ($date as $key => $value) {
                
                return redirect('/admin/goods/attb/'.$date[0]->id)->with(['info'=>'添加成功']);
           // }
            
            }else{
                return redirect('/admin/goods/index')->with(['info'=>'添加失败']);
            }
    }


    public function attb(Request $request, $id)
    {
        //
        $data = \DB::table('goods_att_t')->where('id',$id)->get();
        return view('admin.goods.attb',['title'=>'分类添加','data'=>$data]);
    }


    public function attc(Request $request)
    {
        //
        $data = $request->except("_token");
         // dd($data);
        $res = \DB::table('goods_val_t')->insert($data);
        if($res)
            {
                return redirect('/admin/goods/index')->with(['info'=>'添加成功']);
            }else{
                return redirect('/admin/goods/index')->with(['info'=>'添加失败']);
            }
        
    }

    public function mess(Request $request, $id)
    {
        //
        $data = \DB::table('goods_t')->where('id',$id)->get();
        // dd($data);
        return view('admin.goods.mess',['title'=>'分类编辑','data'=>$data]);

    }
    public function mass(Request $request)
    {
        //
        $data = $request->except("_token");

        $time = date('Y-m-d H:i:s');
        $data['timestamps'] = $time;


        // dd($data);
         $res = \DB::table('goods_inf_t')->insert($data);
            if($res)
            {
                return redirect('/admin/goods/index')->with(['info'=>'添加成功']);
            }else{
                return redirect('/admin/goods/mess')->with(['info'=>'添加失败']);
            }

    }

    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = $request->except("_token");

   
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
        $data = \DB::table('goods_t')->where('id',$id)->get();

        return view('admin.goods.edit',['title'=>'分类编辑','data'=>$data]);

        
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
        //去除_token,_method

        $data  = $request->except("_token");
        $id = $data['id'];
        $data  = $request->except("id","_token");
        // dd($id);
        $res = \DB::table('goods_t')->where('id',$id)->update($data);
         if($res)
            {
                return redirect('/admin/goods/index')->with(['info'=>'修改成功']);
            }else{
                return bock()->with(['info'=>'修改失败']);
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
        // echo $id;
        $data = \DB::table('goods_att_t')->where('gid',$id)->get();
        $date = \DB::table('goods_val_t')->where('nid',$data[0]->id)->get();


        \DB::table('goods_val_t')->where('nid',$data[0]->id)->delete();
       


        \DB::table('goods_att_t')->where('gid',$id)->delete();
       
        
        $res = \DB::table('goods_t')->where('id',$id)->delete();
       if($res)
        {
            return redirect('/admin/goods/index')->with(['info'=>'删除成功']);
        }else{
            return back()->with(['info'=>'删除失败']);
        }
        
        
    }
}
