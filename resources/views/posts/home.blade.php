@extends('master.main')
@section('title', 'Home Posts')
@section('content') 
  <h2>All Posts</h2> 
  <ul>
  @if(count($posts)>0)
@foreach($posts as $post)
  <li> [{{ $post->id }}] - {{ $post->title }} 
    <a href="{{ url('/posts/edit/'.$post->id ) }}">แก้ไข</a>
    <a href="{{ url('/posts/destroy/'.$post->id ) }}" onclick="return confirm('ยืนยันการลบ')">ลบ</a>
  </li>
@endforeach
  @else
    <li>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</li>
  @endif
  </ul>
@endsection