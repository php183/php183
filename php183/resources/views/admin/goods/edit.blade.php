@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       商品管理
        <small>修改数据</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
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
              <h3 class="box-title"></h3>
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
            <form role="form" method="post" action="{{ url('/admin/goods/update') }}">
            	{{ csrf_field() }}
              @foreach($data as $key=>$val)
              <input type="hidden" name="id" value="{{ $val->id }}">
              <div class="box-body">

              {{ session( 'info' )}}
              <div class="form-group">
                  <label for="exampleInputName">商品名</label>
                  <input type="text" name="title" value="{{ $val->title}}" class="form-control" id="exampleInputName" placeholder="Enter uname">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">价格</label>
                  <input type="text" name="price" value="{{ $val->price}}" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">库存</label>
                  <input type="text" name="number" value="{{ $val->number}}" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">确认修改</button>
              </div>
              @endforeach
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection