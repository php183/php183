<?php $__env->startSection('content'); ?>

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
                <?php echo e(session( 'info' )); ?>

           <form action="<?php echo e(url('/admin/user/index')); ?>">
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

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                  <td><?php echo e($val->id); ?></td>
                  <td><?php echo e($val->title); ?></td>
                  <td><?php echo e($val->price); ?></td>
                  <td><?php echo e($val->number); ?></td>
                  <td><?php echo e($val->status); ?></td>
                  <td><a href="<?php echo e(url('/admin/goods/ima')); ?>/<?php echo e($val->id); ?>">添加图片</a>|<a href="<?php echo e(url('/admin/goods/att')); ?>/<?php echo e($val->id); ?>">属性</a>|<a href="<?php echo e(url('/admin/goods/mess')); ?>/<?php echo e($val->id); ?>">信息</a>|<a href="<?php echo e(url('/admin/goods/edit')); ?>/<?php echo e($val->id); ?>">编辑</a>|<a href="<?php echo e(url('/admin/goods/delete')); ?>/<?php echo e($val->id); ?>">删除</a></td>
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