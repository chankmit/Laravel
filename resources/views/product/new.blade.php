@extends('layouts.app')
@section('title', 'New Products')
@section('content')
<div class="container">  
<div class="row">
    <div class="col-md-6"> 
        <h2>เพิ่มสินค้าใหม่</h2>
        <div>กรุณากรอกข้อมูลที่ถูกต้องครบถ้วนด้วยค่ะ</div>
    </div>
    <div class="col-md-6">
        @include('includes.error')
    </div>
</div>
@if(Session::has('add_new_product'))
  <div class="alert alert-success">
    {{ session('add_new_product') }}
  </div>
@endif
    {!! Form::open(['method'=>'POST', 'action'=>'ProductController@store', 'files'=>true]) !!}
    <div class="card">
        <div class="card-header">เพิ่มสินค้าใหม่</div>
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'ชื่อสินค้า') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group row">
                <div class="col-md-6"> 
                    {!! Form::label('cat_id', 'หมวดหมู่สินค้า') !!}
                    {!! Form::select('cat_id',$categories, null, ['class'=>'form-control', 'placeholder' => 'Please Select'])!!}
                </div>
                <div class="col-md-6"> 
                    {!! Form::label('price', 'ราคาสินค้า') !!}
                    {!! Form::number('price', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('image', 'ภาพสินค้า') !!}
                {!! Form::file('image', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('show', 'ข้อความอธิบายสินค้า') !!}
                {!! Form::textarea('show',null,['class'=>'form-control', 'rows' => 2]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('detail', 'รายละเอียด') !!}
                {!! Form::textarea('detail',null,['class'=>'form-control', 'rows' => 5]) !!}
            </div> 
            <div class="form-group row">
                <div class="col-md-6"> 
                    {!! Form::label('instock', 'สต็อกสินค้า') !!}
                    {!! Form::select('instock', [1=>'In Stock', 0=>'Out of Stock'], 1, ['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6"> 
                    {!! Form::label('status', 'สถานะสินค้า') !!}
                    {!! Form::select('status', [1=>'Active', 0=>'Not Active'], 1, ['class'=>'form-control'])!!}
                </div>
            </div>
        </div> 
        <div class="card-footer">
            {!! Form::submit('บันทึกสินค้า', ['class'=>'btn btn-success']) !!}
            {!! link_to('admin/products', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);!!}
        </div>
    </div>
    {!! Form::close() !!} 
</div>
@endsection