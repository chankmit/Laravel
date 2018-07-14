@extends('layouts.app')
@section('title', 'Home Users')
@section('content')  
<div class="container">
  <div class="row">
      <div class="col-md-9">
          <h2>All Users</h2> 
      </div>
      <div class="col-md-3">
      @if (Auth::user()->role == 1 && Auth::user()->status == 1) 
            <a class="btn btn-primary" 
            href="{{ url('/admin/users/create') }}">New User</a>
        @endif
      </div>
  </div>

    <div class="card">
        <div class="card-header">All Users</div> 
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @if(count($users)>0)
                @foreach($users as $user)
                    <tr>
                        <td align="center">
                            {{ $user->id }} <br>
                            @if (Auth::user()->role == 1) 
                            [ <a href="{{ url('/admin/users/'.$user->id.'/edit') }}">Edit</a> ]
                            @endif
                        </td>
                        <td><img src="{{ url($user->image ? "uploads/images/".$user->image : "images/nophoto.jpg") }}" width="100"></td>
                        <td>
                            {{ $user->name }} <br> 
                            @if($user->role === 1)
                                [ Administrator ]
                            @elseif($user->role===2)
                                [ Manager User ]
                            @else
                                [ General User ]
                            @endif
                            {{ $user->status === 1 ? '[ Active ]' : '[ Not Active ]' }}
                        </td>
                        <td> 
                        @if (Auth::user()->role == 1) 
                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy', $user->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endif
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="4">Empty user.</td> 
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->render() }}
</div>
@if(Session::has('success_msg'))  
<script type="text/javascript">     
  swal({
    title: "Good job!",
    text: "{{session('success_msg') }}",
    icon: "success",
  });
</script>  
@endif 
@endsection