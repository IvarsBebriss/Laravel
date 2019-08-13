@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        @include('errors')
        <div class="form-group">

            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">

            <label for="category_id">Category</label>
            <input type="text" name="category_id" class="form-control" value="1">

            <label for="body">Description</label>
            <textarea rows="4" name="body" class="form-control" placeholder="Your post goes here"></textarea>

            <label for="fileToUpload">Post image:</label>
            <input type="file" class="form-control-file" name="fileToUpload">
            <br>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>

    </form>
@endsection