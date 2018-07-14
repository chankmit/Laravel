<?php $__env->startSection('title', 'Edit Posts'); ?>
<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('/posts/update/'.$post[0]->id)); ?>" method="post">
  <h2>Create New Posts</h2>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
  <div class="form-group">
    <label for="name">Post Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo e($post[0]->title); ?>"> 
  </div>
  <div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="content" class="form-control"><?php echo e($post[0]->content); ?></textarea>
  </div> 
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="<?php echo e(url('/posts')); ?>" class="btn btn-primary">Cancel</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>