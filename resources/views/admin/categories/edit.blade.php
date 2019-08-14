@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>
                Edit category
                <div class="pull-right">
                    <a href="{{route('categories.index')}}" class="btn btn-info btn-sm">Go back</a>
                </div>
            </h1>
        </div>
    </div>
    <hr>
    <div class="col-sm-6">
    <form method="post" action="{{route('categories.update', $category->id)}}" >
        @csrf
        @method('put')
        @include('errors')
        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
            <br>
        </div>
        <button type="submit" class="btn btn-primary pull-left">Update</button>
    </form>
    <form action="{{ route('categories.destroy', $category->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger pull-right" name="delete" onclick="return confirm('Are you sure you want to delete this category?');">Delete Category</button>
    </form>
    </div>
@endsection