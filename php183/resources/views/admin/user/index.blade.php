@extends('admin.layout')

<<<<<<< HEAD
@section('content')

<!-- Content Wrapper. Contains page content -->
=======

@section('content')

 <!-- Content Wrapper. Contains page content -->
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
<<<<<<< HEAD
        用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">列表</li>
=======
        用户列表
        <small>用户列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
<<<<<<< HEAD
              <h3 class="box-title">快速查看用户列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <form action="{{ url('/admin/user/index') }}" method="get">
              <div class="row">
              <div class="col-md-2">
              <!-- /.box-header -->
                <div class="form-group">
                    <select name="num" class="form-control">
                      <option value="2">2</option>
                      <option value="4">4</option>
                      <option value="8">8</option>
                      <option value="10">10</option>
                      <option value="50">50</option>
                      </select>
                </div>
              </div>
                <div class="col-md-4 col-md-offset-6">
                  <div class="input-group input-group-sm">
                    <input type="text" name="keywords" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">搜索!</button>
                    </span>
                  </div>
                </div>
              </div>
            </form>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
=======
              <h3 class="box-title">光顾我们商城的用户</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" method = "get">
                <thead>
           <form action="{{ url('/admin/user/index') }}">
			<div class="row">
				<div class="col-md-2">

					<div class="form-group">
		              <select name="num" class="form-control">
		                <option value="2">十条数据</option>
		                <option value="20">二十条数据</option>
		                <option value="50">五十条数据</option>
		                <option value="100">一百条数据</option>
		              </select>
                	</div>

				</div>
                
			  <div class="col-md-4 col-md-offset-6">
					
				<div class="input-group input-group">
			        <input name="keywords" type="text" class="form-control">
		            <span class="input-group-btn">
		              <button type="submit" class="btn btn-info btn-flat">搜索</button>
		           	</span>
		      	</div>

			 </div>
		      
            </div>
           </form>
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
                <tr>
                  <th>ID</th>
                  <th>用户名</th>
                  <th>邮箱</th>
<<<<<<< HEAD
                  <th>头像</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key=>$val)
                <tr>
                  <td>{{ $val->id }}</td>
                  <td class="name">{{ $val->name }}</td>
                  <td>{{ $val->email }}</td>
                  <td><img style="width: 50px;height: 50px;" src ="/uploads/avatar/{{ $val->avatar }}" /></td>
                  <td>编辑 删除</td>
                </tr>
                @endforeach

                </tbody>
              </table>
              {{ $data->appends($request)->links() }}
           </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
=======
                  <th>大头贴</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $val)
                
                <tr>
                  <td>{{ $val->id}}</td>
                  <td>{{ $val->name}}</td>
                  <td>{{ $val->email}}</td>
                  <td><img style="width:50px;height: 50px" src="/uploads/avatar/{{ $val->avatar }}"</td>
                  <td><a href="{{ url('/admin/user/edit') }}/{{ $val->id}}">编辑</a>|<a href="{{ url('/admin/user/delete') }}/{{ $val->id}}">删除</a></td>
                </tr>
                @endforeach
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<<<<<<< HEAD
@endsection

@section('js')
  <script type="text/javascript">
    alert($);
  </script>
=======
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c

@endsection