@extends('master.main')
@section('title', 'Edit Posts')
@section('header')

@endsection
@section('content')
<form action="{{ url('/posts/update/'.$post[0]->id) }}" method="post">
  <h2>Create New Posts</h2>
  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  <div class="form-group">
    <label for="name">Post Name</label>
    <input type="text" name="name" class="form-control" value="{{$post[0]->title}}"> 
  </div>
  <div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="content" class="form-control">{{$post[0]->content}}</textarea>
  </div> 
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{ url('/posts') }}" class="btn btn-primary">Cancel</a>
</form>
@endsection