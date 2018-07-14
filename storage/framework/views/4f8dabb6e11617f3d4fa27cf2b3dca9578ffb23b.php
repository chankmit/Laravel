<?php $__env->startSection('title', 'Home Categories'); ?>
<?php $__env->startSection('content'); ?> 
<div class="row">
    <div class="col-md-9">
        <h2>Update Category</h2> 
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(url('/admin/categories')); ?>">Back to all categories</a>
    </div>
</div>
<form action="<?php echo e(url('/admin/categories/update/'.$category->id)); ?>" method="post">
<?php echo e(csrf_field()); ?> 
  <table class="table">   
    <tr>
      <td style="background-color:#f3f3f3">Name</td>
      <td><input type="text" name="name" class="form-control" value="<?php echo e($category->name); ?>"></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Detail</td>
      <td><textarea name="detail" class="form-control"><?php echo e($category->detail); ?></textarea></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Status</td>
      <td>
        <select name="status" class="form-control">
            <option value="0" <?php echo e($category->status === 0 ? "selected" : ""); ?> >Not Active</option>
            <option value="1" <?php echo e($category->status === 1 ? "selected" : ""); ?>>Active</option>
        </select>
      </td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3"></td>
      <td>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?php echo e(url('/admin/categories')); ?>" class="btn btn-danger">Cancel</a>
      </td> 
    </tr>    
  </table>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>