@extends('master.main')
@section('title', 'New Posts')
@section('header')

@endsection
@section('content')
<form action="{{ url('/posts/insert') }}" method="post">
  <h2>Create New Posts</h2>
  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  <div class="form-group">
    <label for="name">Post Name</label>
    <input type="text" name="name" class="form-control"> 
  </div>
  <div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="content" class="form-control"></textarea>
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection