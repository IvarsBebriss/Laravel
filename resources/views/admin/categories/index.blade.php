@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Categories</h1>
    </div>
</div>
<hr>
@include('errors')

<div class="row">
    <div class="col-sm-6">
        <form method="post" action="{{route('categories.store')}}" >
            @csrf
            <div class="form-group">
                <label for="name">Category</label>
                <input type="text" name="name" class="form-control" placeholder="Category Name">
                <br>
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>

        </form>
    </div>

    <div class="col-sm-6">
        @if (isset($categories))
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Posts</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr onclick="window.location.href='{{route('categories.edit',$category->id)}}'">
                        <td>{{$category->name}}</td>
                        <td>{{$category->post_count}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <small>Click on category to edit/delete</small>
        @else
            <p>No Categories to show</p>
        @endif
    </div>
</div>

@endsection

@section('footer')
@endsection

