@extends('layouts.app')
@section('title', 'New User')
@section('content')
<div class="container">  
<div class="row">
    <div class="col-md-6"> 
        <h2>แก้ไขผู้ใช้งาน</h2>
        <div>กรุณากรอกข้อมูลที่ถูกต้องครบถ้วนด้วยค่ะ</div>
    </div>
    <div class="col-md-6">
        @include('includes.error')
    </div>
</div>
{!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserController@update', $user->id], 'files'=>true]) !!}
    <div class="card">
        <div class="card-header">เพิ่มผู้ใช้งานใหม่</div>
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'ชื่อนามสกุล') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('email', 'อีเมล์') !!}
                {!! Form::email('email', null, ['class'=>'form-control', 'disabled'=>'disabled']) !!}
            </div>  
            <div class="form-group">
                {!! Form::label('image', 'ภาพประจำตัว') !!}
                {!! Form::file('image', ['class'=>'form-control']) !!}
            </div>  
            <div class="form-group row">
                <div class="col-md-6"> 
                    {!! Form::label('role', 'สิทธิ์การใช้งาน') !!}
                    {!! Form::select('role', [2=>'Manager', 1=>'Administrator', 0=>'General User'], Null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6"> 
                    {!! Form::label('status', 'สถานะบัญชี') !!}
                    {!! Form::select('status', [1=>'Active', 0=>'Not Active'], Null, ['class'=>'form-control'])!!}
                </div>
            </div>
        </div> 
        <div class="card-footer">
            {!! Form::submit('บันทึกข้อมูลผู้ใช้', ['class'=>'btn btn-success']) !!}
            {!! link_to('admin/users', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);!!}
        </div>
    </div>
    {!! Form::close() !!} 
</div>
@endsection