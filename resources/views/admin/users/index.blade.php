@extends('layouts.admin')

@section('content')

<h1>Users</h1>
<table class="table table-striped">
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
        @if (isset($users))
            @foreach($users as $user)
            <tr>
                <td><img width="50px" src="{{($user->photos->count() > 0) ? $user->photos->first()->path : '\images\noimage.png'}}" alt="IMAGE"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->status ? "Active":"Inactive"}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-xs">Edit</a></td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>



@endsection

@section('footer')
@endsection

