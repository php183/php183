@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商品列表
        <small>商品列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">我们商城的商品</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" method = "get">
                <thead>
                {{ session( 'info' )}}
           <form action="{{ url('/admin/user/index') }}">
			<div class="row">
           </form>
                <tr>
                  <th>ID</th>
                  <th>商品名</th>
                  <th>价格</th>
                  <th>库存</th>
                  <th>状态</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $val)
                
                <tr>
                  <td>{{ $val->id}}</td>
                  <td>{{ $val->title}}</td>
                  <td>{{ $val->price}}</td>
                  <td>{{ $val->number}}</td>
                  <td>{{ $val->status}}</td>
                  <td><a href="{{ url('/admin/goods/ima') }}/{{ $val->id}}">添加图片</a>|<a href="{{ url('/admin/goods/att') }}/{{ $val->id}}">属性</a>|<a href="{{ url('/admin/goods/mess') }}/{{ $val->id}}">信息</a>|<a href="{{ url('/admin/goods/edit') }}/{{ $val->id}}">编辑</a>|<a href="{{ url('/admin/goods/delete') }}/{{ $val->id}}">删除</a></td>
                </tr>
                @endforeach
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection