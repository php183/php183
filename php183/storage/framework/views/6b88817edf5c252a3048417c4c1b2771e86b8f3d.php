<?php $__env->startSection('content'); ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户列表
        <small>用户列表</small>
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
              <h3 class="box-title">光顾我们商城的用户</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" method = "get">
                <thead>
           <form action="<?php echo e(url('/admin/user/index')); ?>">
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
                <tr>
                  <th>ID</th>
                  <th>用户名</th>
                  <th>邮箱</th>
                  <th>大头贴</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                  <td><?php echo e($val->id); ?></td>
                  <td><?php echo e($val->name); ?></td>
                  <td><?php echo e($val->email); ?></td>
                  <td><img style="width:50px;height: 50px" src="/uploads/avatar/<?php echo e($val->avatar); ?>"</td>
                  <td><a href="<?php echo e(url('/admin/user/edit')); ?>/<?php echo e($val->id); ?>">编辑</a>|<a href="<?php echo e(url('/admin/user/delete')); ?>/<?php echo e($val->id); ?>">删除</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>