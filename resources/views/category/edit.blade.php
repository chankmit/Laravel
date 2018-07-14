@extends('master.main')
@section('title', 'Home Categories')
@section('content') 
<div class="row">
    <div class="col-md-9">
        <h2>Update Category</h2> 
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ url('/admin/categories') }}">Back to all categories</a>
    </div>
</div>
<form action="{{ url('/admin/categories/update/'.$category->id) }}" method="post">
{{ csrf_field() }} 
  <table class="table">   
    <tr>
      <td style="background-color:#f3f3f3">Name</td>
      <td><input type="text" name="name" class="form-control" value="{{ $category->name }}"></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Detail</td>
      <td><textarea name="detail" class="form-control">{{ $category->detail }}</textarea></td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3">Status</td>
      <td>
        <select name="status" class="form-control">
            <option value="0" {{ $category->status === 0 ? "selected" : "" }} >Not Active</option>
            <option value="1" {{ $category->status === 1 ? "selected" : "" }}>Active</option>
        </select>
      </td> 
    </tr> 
    <tr>
      <td style="background-color:#f3f3f3"></td>
      <td>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancel</a>
      </td> 
    </tr>    
  </table>
</form>
@endsection