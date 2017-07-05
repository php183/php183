@extends('admin.layout')

@section('content')
<<<<<<< HEAD
	 <!-- Content Wrapper. Contains page content -->
=======

<!-- Content Wrapper. Contains page content -->
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
<<<<<<< HEAD
        用户管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">添加</li>
=======
       用户管理
        <small>添加数据</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
<<<<<<< HEAD
              <h3 class="box-title">快速添加</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/admin/user/insert')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
              

			       @if (session('info'))
					    <div class="alert alert-danger">
					       {{session('info')}}
					    </div>
					@endif


                    @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
              	<div class="form-group">
                  <label for="exampleInputName">用户名</label>
                  <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputName" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">邮箱</label>
                  <input type="email" value=" {{old('email')}} " name="email" class="form-control" id="exampleInputEmail1" placeholder="请输入邮箱">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" value=" {{old('password')}} " name="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword2">确认密码</label>
                  <input type="password" value=" {{old('re_password')}} " name="re_password" class="form-control" id="exampleInputPassword2" placeholder="请输入确认密码">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">头像</label>
                  <input type="file" name="avatar" id="exampleInputFile">

                  <p class="help-block">请选择你的头像</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
=======
              <h3 class="box-title">请输入你的个性名称</h3>
            </div>

            @if (count($errors) > 0)
            	<div class="alert alert-danger">
            		<ul>
            			@foreach ($errors->all() as $error)
            				<li>{{ $error }}</li>
            			@endforeach
            		</ul>
            	</div>
            @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/admin/user/insert') }}">
            	{{ csrf_field() }}
              <div class="box-body">

              {{ session( 'info' )}}
              <div class="form-group">
                  <label for="exampleInputName">用户名</label>
                  <input type="text" name="name" value="{{ old('name')}}" class="form-control" id="exampleInputName" placeholder="Enter uname">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">邮箱</label>
                  <input type="email" name="email" value="{{ old('password') }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" name="password" value="{{ old('name')}}" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">请再次输入密码</label>
                  <input type="password" name="re_password" value="{{ old('re_password')}}"class="form-control" id="exampleInputPassword2" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">选择个人头像</label>
                  <input type="file" name="avatar" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> 记住密码
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
<<<<<<< HEAD
                <button type="submit" class="btn btn-primary">Submit</button>
=======
                <button type="submit" class="btn btn-primary">提交</button>
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
              </div>
            </form>
          </div>
          <!-- /.box -->

<<<<<<< HEAD
 


    

        </div>
        <!--/.col (left) -->
    
=======
         

        </div>
        <!--/.col (left) -->
        
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<<<<<<< HEAD
@endsection('content')
=======
  <!-- /.content-wrapper -->

@endsection
>>>>>>> d24064ab3e687398db55ebc08ee58a706301cb2c
