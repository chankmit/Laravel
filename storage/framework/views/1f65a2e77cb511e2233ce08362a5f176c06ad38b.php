<?php $__env->startSection('title', 'Home Products'); ?>
<?php $__env->startSection('content'); ?>  
<div class="container">
  <div class="row">
      <div class="col-md-9">
          <h2>All Products</h2> 
      </div>
      <div class="col-md-3">
          <a class="btn btn-primary" 
          href="<?php echo e(url('/admin/products/create')); ?>">New Product</a>
      </div>
  </div>

<?php if(Session::has('add_new_product')): ?>
  <div class="alert alert-success">
    <?php echo e(session('add_new_product')); ?>

  </div>
<?php endif; ?>

  <table class="table"> 
    <tr style="background-color:#f3f3f3">
      <td>ID</td>
      <td>Image</td>
      <td>Name</td> 
      <td>Action</td> 
    </tr> 
  <?php if(count($products)>0): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td align="center">
      <?php echo e($product->id); ?><br>
      <a href="<?php echo e(url('/admin/products/'.$product->id.'/edit')); ?>" class="btn btn-info">Edit</a>
      </td>
      <td> <img src="<?php echo e(url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg")); ?>" width="100"></td>
      <td>
        <a href="<?php echo e(url('admin/products/show/'.$product->id)); ?>">
          <?php echo e($product->name); ?>  
        </a> 
        ประจำหมวดหมู่ : <?php echo e($product->category->name); ?>  
        <div>
        <?php echo e($product->show); ?>  
        </div>
      </td>  
      <td>
      <?php echo Form::open(['method'=>'DELETE', 'action'=>['ProductController@destroy', $product->id]]); ?>

      <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

      <?php echo Form::close(); ?>

      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
    <tr colspan="3">
      <td>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
    </tr>
  <?php endif; ?>
  </table>
  <?php echo e($products->render()); ?>

</div>
 
<?php if(Session::has('destroy_product')): ?>  
<script type="text/javascript">     
  swal({
    title: "Good job!",
    text: "<?php echo e(session('destroy_product')); ?>",
    icon: "success",
  });
</script>  
<?php endif; ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>