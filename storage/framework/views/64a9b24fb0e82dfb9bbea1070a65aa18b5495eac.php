<?php $__env->startSection('title', 'Home Users'); ?>
<?php $__env->startSection('content'); ?>  
<div class="container">
  <div class="row">
      <div class="col-md-9">
          <h2>All Users</h2> 
      </div>
      <div class="col-md-3">
      <?php if(Auth::user()->role == 1 && Auth::user()->status == 1): ?> 
            <a class="btn btn-primary" 
            href="<?php echo e(url('/admin/users/create')); ?>">New User</a>
        <?php endif; ?>
      </div>
  </div>

    <div class="card">
        <div class="card-header">All Users</div> 
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($users)>0): ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td align="center">
                            <?php echo e($user->id); ?> <br>
                            <?php if(Auth::user()->role == 1): ?> 
                            [ <a href="<?php echo e(url('/admin/users/'.$user->id.'/edit')); ?>">Edit</a> ]
                            <?php endif; ?>
                        </td>
                        <td><img src="<?php echo e(url($user->image ? "uploads/images/".$user->image : "images/nophoto.jpg")); ?>" width="100"></td>
                        <td>
                            <?php echo e($user->name); ?> <br> 
                            <?php if($user->role === 1): ?>
                                [ Administrator ]
                            <?php elseif($user->role===2): ?>
                                [ Manager User ]
                            <?php else: ?>
                                [ General User ]
                            <?php endif; ?>
                            <?php echo e($user->status === 1 ? '[ Active ]' : '[ Not Active ]'); ?>

                        </td>
                        <td> 
                        <?php if(Auth::user()->role == 1): ?> 
                        <?php echo Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy', $user->id]]); ?>

                        <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

                        <?php echo Form::close(); ?>

                        <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Empty user.</td> 
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo e($users->render()); ?>

</div>
<?php if(Session::has('success_msg')): ?>  
<script type="text/javascript">     
  swal({
    title: "Good job!",
    text: "<?php echo e(session('success_msg')); ?>",
    icon: "success",
  });
</script>  
<?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>