@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="left">Edit user
            <div class="pull-right">
                <a href="{{route('users.index')}}" class="btn btn-info btn-sm">Go back</a>
            </div>
        </h1>
    </div>
</div>
<hr>
<div class="col-sm-3">
    <img class="img-responsive img-circle" src="{{($user->photo->count() > 0) ? $user->photo->first()->path : '\images\noimage.png'}}" height="50px" alt="IMAGE">
</div>
<div class="col-sm-9">
    <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('errors')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">

            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}">

            <label for="role_id">Role</label>
            <select name="role_id" class="form-control custom-select">
                @foreach($roles as $role)
                    <option {{$role->id == $user->role_id ? "selected " : ""}}value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>

            <label for="status">Status:</label>
            <select name="status" class="form-control custom-select">
                <option value="0" {{$user->status == 0 ? "selected " : ""}}>Not active</option>
                <option value="1" {{$user->status == 1 ? "selected " : ""}}>Active</option>
            </select>

            <label for="fileToUpload">Profile image:</label>
            <input type="file" class="form-control-file" name="fileToUpload">

            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" value="12345678">
            <br>
        </div>
        <button type="submit" class="btn btn-success pull-left" name="submit">Update User</button>
    </form>
    <form action="{{ route('users.destroy', $user->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger pull-right" name="delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
    </form>
</div>
@endsection

@section('footer')

@endsection