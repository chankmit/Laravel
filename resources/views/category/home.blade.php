@extends('layouts.app')
@section('title', 'Home Categories')
@section('content')  
<div class="container">
  <div class="row">
      <div class="col-md-9">
          <h2>All Categories</h2> 
      </div>
      <div class="col-md-3">
          <a class="btn btn-primary" 
          href="{{ url('/admin/categories/new') }}">New Category</a>
      </div>
  </div>
  <table class="table"> 
    <tr style="background-color:#f3f3f3">
      <td>ID</td>
      <td>ICON</td>
      <td>Name</td>
      <td>Actions</td>
    </tr> 
  @if(count($categories)>0)
    @foreach($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td><img src="{{ url($category->caticon['name'] ? "uploads/images/".$category->caticon['name'] : "images/nophoto.jpg") }}" width="100"></td>
      <td>
        <a href="{{ url('admin/categories/show/'.$category->id)}}">
          {{ $category->name }}  
        </a>
      </td>
      <td>{{ $category->detail }}</td>  
    </tr>
    @endforeach
  @else
    <tr colspan="3">
      <td>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
    </tr>
  @endif
  </table>
  {{ $categories->render() }}
</div>
@endsection