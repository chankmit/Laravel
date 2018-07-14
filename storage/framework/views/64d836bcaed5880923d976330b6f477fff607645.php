<?php $__env->startSection('title', 'New User'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">  
<div class="row">
    <div class="col-md-6"> 
        <h2>เพิ่มผู้ใช้งานใหม่</h2>
        <div>กรุณากรอกข้อมูลที่ถูกต้องครบถ้วนด้วยค่ะ</div>
    </div>
    <div class="col-md-6">
        <?php echo $__env->make('includes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
    <?php echo Form::open(['method'=>'POST', 'action'=>'UserController@store', 'files'=>true]); ?>

    <div class="card">
        <div class="card-header">เพิ่มผู้ใช้งานใหม่</div>
        <div class="card-body">
            <div class="form-group">
                <?php echo Form::label('name', 'ชื่อนามสกุล'); ?>

                <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('email', 'อีเมล์'); ?>

                <?php echo Form::email('email', null, ['class'=>'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('password', 'รหัสผ่าน'); ?>

                <?php echo Form::text('password', null, ['class'=>'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('image', 'ภาพประจำตัว'); ?>

                <?php echo Form::file('image', ['class'=>'form-control']); ?>

            </div>  
            <div class="form-group row">
                <div class="col-md-6"> 
                    <?php echo Form::label('role', 'สิทธิ์การใช้งาน'); ?>

                    <?php echo Form::select('role', [2=>'Manager', 1=>'Administrator', 0=>'General User'], 0, ['class'=>'form-control']); ?>

                </div>
                <div class="col-md-6"> 
                    <?php echo Form::label('status', 'สถานะบัญชี'); ?>

                    <?php echo Form::select('status', [1=>'Active', 0=>'Not Active'], 1, ['class'=>'form-control']); ?>

                </div>
            </div>
        </div> 
        <div class="card-footer">
            <?php echo Form::submit('บันทึกข้อมูลผู้ใช้', ['class'=>'btn btn-success']); ?>

            <?php echo link_to('admin/users', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);; ?>

        </div>
    </div>
    <?php echo Form::close(); ?> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>