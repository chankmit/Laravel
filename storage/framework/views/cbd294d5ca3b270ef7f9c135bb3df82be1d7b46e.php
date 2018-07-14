<?php $__env->startSection('title', 'New Products'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">  
<div class="row">
    <div class="col-md-6"> 
        <h2>เพิ่มสินค้าใหม่</h2>
        <div>กรุณากรอกข้อมูลที่ถูกต้องครบถ้วนด้วยค่ะ</div>
    </div>
    <div class="col-md-6">
        <?php echo $__env->make('includes.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php if(Session::has('add_new_product')): ?>
  <div class="alert alert-success">
    <?php echo e(session('add_new_product')); ?>

  </div>
<?php endif; ?>
    <?php echo Form::open(['method'=>'POST', 'action'=>'ProductController@store', 'files'=>true]); ?>

    <div class="card">
        <div class="card-header">เพิ่มสินค้าใหม่</div>
        <div class="card-body">
            <div class="form-group">
                <?php echo Form::label('name', 'ชื่อสินค้า'); ?>

                <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

            </div>
            <div class="form-group row">
                <div class="col-md-6"> 
                    <?php echo Form::label('cat_id', 'หมวดหมู่สินค้า'); ?>

                    <?php echo Form::select('cat_id',$categories, null, ['class'=>'form-control', 'placeholder' => 'Please Select']); ?>

                </div>
                <div class="col-md-6"> 
                    <?php echo Form::label('price', 'ราคาสินค้า'); ?>

                    <?php echo Form::number('price', null, ['class'=>'form-control']); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo Form::label('image', 'ภาพสินค้า'); ?>

                <?php echo Form::file('image', ['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('show', 'ข้อความอธิบายสินค้า'); ?>

                <?php echo Form::textarea('show',null,['class'=>'form-control', 'rows' => 2]); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('detail', 'รายละเอียด'); ?>

                <?php echo Form::textarea('detail',null,['class'=>'form-control', 'rows' => 5]); ?>

            </div> 
            <div class="form-group row">
                <div class="col-md-6"> 
                    <?php echo Form::label('instock', 'สต็อกสินค้า'); ?>

                    <?php echo Form::select('instock', [1=>'In Stock', 0=>'Out of Stock'], 1, ['class'=>'form-control']); ?>

                </div>
                <div class="col-md-6"> 
                    <?php echo Form::label('status', 'สถานะสินค้า'); ?>

                    <?php echo Form::select('status', [1=>'Active', 0=>'Not Active'], 1, ['class'=>'form-control']); ?>

                </div>
            </div>
        </div> 
        <div class="card-footer">
            <?php echo Form::submit('บันทึกสินค้า', ['class'=>'btn btn-success']); ?>

            <?php echo link_to('admin/products', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);; ?>

        </div>
    </div>
    <?php echo Form::close(); ?> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>