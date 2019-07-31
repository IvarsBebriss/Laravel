@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>
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

            <label for="password">Password reset disabled</label>
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Update User">
        </div>

    </form>

    <form action="{{ route('users.destroy', $user->id)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" name="delete" value="DELETE USER">
    </form>

@endsection

@section('footer')

@endsection