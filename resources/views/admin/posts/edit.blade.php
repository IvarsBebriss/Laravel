@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>
    <div class="col-sm-3">
        <img class="img-responsive img-circle" src="{{($post->photo->count() > 0) ? $post->photo->first()->path : '\images\noimage.png'}}" height="50px" alt="IMAGE">
    </div>

    <div class="col-sm-9">
        <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('errors')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">

                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option {{$post->category_id == $category->id ? 'selected ' : ''}}value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <label for="body">Description</label>
                <textarea rows="4" name="body" class="form-control">{{$post->body}}</textarea>

                <label for="fileToUpload">Post image:</label>

                <input type="file" class="form-control-file" name="fileToUpload">
                <br>
            </div>
            <button type="submit" class="btn btn-success pull-left">Update Post</button>
        </form>
        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger pull-right" name="delete" onclick="return confirm('Are you sure you want to delete this post?');">Delete Post</button>
        </form>
    </div>
@endsection