@extends('layouts.app')
@section('title', 'Home Categories')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-9">
        <h2>New Category</h2> 
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ url('/admin/categories') }}">Back to all categories</a>
    </div>
</div>
<form action="{{ url('/admin/categories/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }} 
  <table class="table">   
    <tr>
      <td style="background-color:#f3f3f3">Name</td>
      <td><input type="text" name="name" class="form-control"></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Detail</td>
      <td><textarea name="detail" class="form-control"></textarea></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Category Icon</td>
      <td><input type="file" name="photo_id" class="form-control"></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Status</td>
      <td>
        <select name="status" class="form-control">
            <option value="0">Not Active</option>
            <option value="1">Active</option>
        </select>
      </td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3"></td>
      <td>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancel</a>
      </td> 
    </tr>    
  </table>
</form>
</div> 
@endsection