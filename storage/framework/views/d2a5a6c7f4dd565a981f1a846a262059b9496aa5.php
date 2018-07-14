<?php $__env->startSection('title', 'Home Categories'); ?>
<?php $__env->startSection('content'); ?>  
<div class="container">
  <div class="row">
      <div class="col-md-9">
          <h2>All Categories</h2> 
      </div>
      <div class="col-md-3">
          <a class="btn btn-primary" 
          href="<?php echo e(url('/admin/categories/new')); ?>">New Category</a>
      </div>
  </div>
  <table class="table"> 
    <tr style="background-color:#f3f3f3">
      <td>ID</td>
      <td>ICON</td>
      <td>Name</td>
      <td>Actions</td>
    </tr> 
  <?php if(count($categories)>0): ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($category->id); ?></td>
      <td><img src="<?php echo e(url($category->caticon['name'] ? "uploads/images/".$category->caticon['name'] : "images/nophoto.jpg")); ?>" width="100"></td>
      <td>
        <a href="<?php echo e(url('admin/categories/show/'.$category->id)); ?>">
          <?php echo e($category->name); ?>  
        </a>
      </td>
      <td><?php echo e($category->detail); ?></td>  
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
    <tr colspan="3">
      <td>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
    </tr>
  <?php endif; ?>
  </table>
  <?php echo e($categories->render()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>