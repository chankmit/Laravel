<?php $__env->startSection('title', 'Home Categories'); ?>
<?php $__env->startSection('content'); ?> 
<div class="row">
    <div class="col-md-9">
        <h2>Show Category</h2> 
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(url('/admin/categories')); ?>">Back to all categories</a>
    </div>
</div>
  <table class="table">  
    <tr>
      <td style="background-color:#f3f3f3">ID</td>
      <td><?php echo e($category->id); ?></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Name</td>
      <td><?php echo e($category->name); ?> <?php echo e($category->caticon); ?></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Detail</td>
      <td><?php echo e($category->detail); ?></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Status</td>
      <td><?php echo e($category->status === 1 ? "Active" : "Not Active"); ?></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Created At</td>
      <td><?php echo e($category->created_at); ?></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Actions</td>
      <td>
            <a href="<?php echo e(url('admin/categories/edit/'.$category->id)); ?>" class="btn btn-success" >Edit</a>
            <a href="<?php echo e(url('admin/categories/delete/'.$category->id)); ?>" onclick="return confirm('Confirm your action?')" class="btn btn-danger">Delete</a>

      </td> 
    </tr>  
  </table> 
  <h2>Products in "<?php echo e($category->name); ?>"</h2> 
  
  <table class="table"> 
    <tr style="background-color:#f3f3f3">
      <td>ID</td>
      <td>Image</td>
      <td>Name</td> 
    </tr>
    <?php if(count($category->products)>0): ?>
    <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($product->id); ?></td>
      <td><img src="<?php echo e(url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg")); ?>" width="100"></td>
      <td><?php echo e($product->name); ?> ราคา <?php echo e($product->price); ?> บาท
        <div><?php echo e($product->show); ?></div>
      </td>  
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
      <tr>
        <td colspan="3">ไม่มีข้อมูลสินค้าในขณะนี้</td>
      </tr>
    <?php endif; ?> 
  </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>