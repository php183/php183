@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
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
                <tr>
                  <th>ID</th>
                  <th>用户名</th>
                  <th>邮箱</th>
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
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    alert($);
  </script>

@endsection