@extends('layouts.app')
@section('title', 'Home Products')
@section('content')  
<div class="container">
  <div class="row">
      <div class="col-md-9">
          <h2>All Products</h2> 
      </div>
      <div class="col-md-3">
          <a class="btn btn-primary" 
          href="{{ url('/admin/products/create') }}">New Product</a>
      </div>
  </div>

@if(Session::has('add_new_product'))
  <div class="alert alert-success">
    {{ session('add_new_product') }}
  </div>
@endif

  <table class="table"> 
    <tr style="background-color:#f3f3f3">
      <td>ID</td>
      <td>Image</td>
      <td>Name</td> 
      <td>Action</td> 
    </tr> 
  @if(count($products)>0)
    @foreach($products as $product)
    <tr>
      <td align="center">
      {{ $product->id }}<br>
      <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" class="btn btn-info">Edit</a>
      </td>
      <td> <img src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="100"></td>
      <td>
        <a href="{{ url('admin/products/show/'.$product->id)}}">
          {{ $product->name }}  
        </a> 
        ประจำหมวดหมู่ : {{ $product->category->name }}  
        <div>
        {{ $product->show }}  
        </div>
      </td>  
      <td>
      {!! Form::open(['method'=>'DELETE', 'action'=>['ProductController@destroy', $product->id]]) !!}
      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
      {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  @else
    <tr colspan="3">
      <td>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
    </tr>
  @endif
  </table>
  {{ $products->render() }}
</div>
 
@if(Session::has('destroy_product'))  
<script type="text/javascript">     
  swal({
    title: "Good job!",
    text: "{{session('destroy_product') }}",
    icon: "success",
  });
</script>  
@endif 

@endsection