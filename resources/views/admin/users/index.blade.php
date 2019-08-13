@extends('layouts.admin')

@section('content')

<h1>Users</h1>
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
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><img width="50px" src="{{($user->photo->count() > 0) ? $user->photo->first()->path : '\images\noimage.png'}}" alt="IMAGE"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->status ? "Active":"Inactive"}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-xs">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif



@endsection

@section('footer')
@endsection

