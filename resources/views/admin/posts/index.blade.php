@extends('layouts.admin')

@section('content')
<h1>Posts</h1>
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
            <tr>
                <td><img width="50px" src="{{($post->photo->count() > 0) ? $post->photo->first()->path : '\images\noimage.png'}}" alt="IMAGE"></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{strlen($post->body)>100 ? substr($post->body,0,100).'...' : $post->body}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-xs">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@else
    <p>no posts to show</p>
@endif


@endsection
