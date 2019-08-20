@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Photos</h1>
        </div>
    </div>
    <hr>
    @include('errors')
    @if ($photos)
        <?php $counter=1?>
        <div class="row">
        @foreach($photos as $photo)
            <div class="card col-sm-3 pull-left">
                <h3 class="card-header">header</h3>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <h6 class="card-subtitle text-muted">Support card {{$photo->imageable['id']}}subtitle</h6>
                </div>
                <?php
                    $imageable = $photo->imageable;
                    print_r($imageable['id']);
                ?>


                <img style="max-width: 100%; max-height: 100px; display: block;" src="{{$photo->path}}" alt="Card image">
                <div class="card-body">
                    <p class="card-text">text</p>
                </div>
                <div class="card-footer text-muted">
                    {{$photo->created_at->diffForHumans()}}
                </div>
            </div>
            @if($counter++ % 4 == 0)
        </div><div class="row">
            @endif
        @endforeach
        </div>
        <br>
        <small>Click on image to view/delete</small>
    @else
        <p>no media to show</p>
    @endif


@endsection
