<?php $__env->startSection('title', 'New Posts'); ?>
<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('/posts/insert')); ?>" method="post">
  <h2>Create New Posts</h2>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
  <div class="form-group">
    <label for="name">Post Name</label>
    <input type="text" name="name" class="form-control"> 
  </div>
  <div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="content" class="form-control"></textarea>
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>