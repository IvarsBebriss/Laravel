@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="left">
                Create a category
                <div class="pull-right">
                    <a href="{{route('categories.index')}}" class="btn btn-info btn-sm">Go back</a>
                </div>
            </h1>
        </div>
    </div>
    <hr>
    <form method="post" action="{{route('categories.store')}}" >
        @csrf
        @include('errors')
        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Category">
            <br>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </div>

    </form>
@endsection