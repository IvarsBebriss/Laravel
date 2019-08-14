@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Posts</h1>
        </div>
    </div>
    <hr>
@include('errors')
@if (isset($posts))
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Author</th>
                <th>Title</th>
                <th>Post</th>
                <th>Category</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr onclick="window.location.href='{{route('posts.edit',$post->id)}}'">
                <td><img width="50px" src="{{($post->photo->count() > 0) ? $post->photo->first()->path : '\images\noimage.png'}}" alt="IMAGE"></td>
                <td>{{$post->user ? $post->user->name : 'unknown'}}</td>
                <td>{{$post->title}}</td>
                <td>{{Str::limit($post->body,30)}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-xs">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <small>Click on post to edit/delete</small>
    {{ $posts->links() }}
@else
    <p>no posts to show</p>
@endif


@endsection
