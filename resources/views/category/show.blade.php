@extends('master.main')
@section('title', 'Home Categories')
@section('content') 
<div class="row">
    <div class="col-md-9">
        <h2>Show Category</h2> 
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ url('/admin/categories') }}">Back to all categories</a>
    </div>
</div>
  <table class="table">  
    <tr>
      <td style="background-color:#f3f3f3">ID</td>
      <td>{{ $category->id }}</td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Name</td>
      <td>{{ $category->name }} {{ $category->caticon }}</td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Detail</td>
      <td>{{ $category->detail }}</td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Status</td>
      <td>{{ $category->status === 1 ? "Active" : "Not Active" }}</td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Created At</td>
      <td>{{ $category->created_at }}</td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Actions</td>
      <td>
            <a href="{{ url('admin/categories/edit/'.$category->id) }}" class="btn btn-success" >Edit</a>
            <a href="{{ url('admin/categories/delete/'.$category->id) }}" onclick="return confirm('Confirm your action?')" class="btn btn-danger">Delete</a>

      </td> 
    </tr>  
  </table> 
  <h2>Products in "{{ $category->name }}"</h2> 
  
  <table class="table"> 
    <tr style="background-color:#f3f3f3">
      <td>ID</td>
      <td>Image</td>
      <td>Name</td> 
    </tr>
    @if(count($category->products)>0)
    @foreach($category->products as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td><img src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="100"></td>
      <td>{{ $product->name }} ราคา {{ $product->price }} บาท
        <div>{{ $product->show}}</div>
      </td>  
    </tr>
    @endforeach
    @else
      <tr>
        <td colspan="3">ไม่มีข้อมูลสินค้าในขณะนี้</td>
      </tr>
    @endif 
  </table>
@endsection