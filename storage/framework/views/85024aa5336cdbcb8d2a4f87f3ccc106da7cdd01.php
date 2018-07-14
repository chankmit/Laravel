<?php $__env->startSection('title', 'Home Posts'); ?>
<?php $__env->startSection('content'); ?> 
  <h2>All Posts</h2> 
  <ul>
  <?php if(count($posts)>0): ?>
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li> [<?php echo e($post->id); ?>] - <?php echo e($post->title); ?> 
    <a href="<?php echo e(url('/posts/edit/'.$post->id )); ?>">แก้ไข</a>
    <a href="<?php echo e(url('/posts/destroy/'.$post->id )); ?>" onclick="return confirm('ยืนยันการลบ')">ลบ</a>
  </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
    <li>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</li>
  <?php endif; ?>
  </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>