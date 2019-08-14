@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Users</h1>
    </div>
</div>
<hr>
@include('errors')
@if (isset($users))
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>e-mail</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Posts</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr onclick="window.location.href='{{route('users.edit',$user->id)}}'">
            <td><img width="50px" src="{{($user->photo->count() > 0) ? $user->photo->first()->path : '\images\noimage.png'}}" alt="IMAGE"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->status ? "Active":"Inactive"}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>{{$user->post_count}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<small>Click on user to edit/delete</small>
@endif



@endsection

@section('footer')
@endsection

