@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="left">
                Create a User
                <div class="pull-right">
                    <a href="{{route('users.index')}}" class="btn btn-info btn-sm">Go back</a>
                </div>
            </h1>
        </div>
    </div>
    <hr>
    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf
        @include('errors')
        <div class="form-group">

            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">

            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="Enter e-mail">

            <label for="role_id">Role</label>
            <select name="role_id" class="form-control custom-select">
                <option selected>Choose...</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>

            <label for="status">Status:</label>
            <select name="status" class="form-control custom-select">
                <option value="0" selected>Not active</option>
                <option value="1">Active</option>
            </select>

            <label for="fileToUpload">Profile image:</label>
            <input type="file" class="form-control-file" name="fileToUpload">

            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">

            <input type="submit" class="btn btn-primary" name="submit" value="Create User">
        </div>

    </form>

@endsection

@section('footer')

@endsection