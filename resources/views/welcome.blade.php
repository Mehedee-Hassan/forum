@extends('layouts.front')


@section('banner')
    <div class="jumbotron">
        <div class="container">
            <h1>test forums</h1>
            <p> Help and get help</p>
            <p>
                <a class="btn btn-primary btn-lg">Learn more</a>
            </p>
        </div>
    </div>


@endsection

@section('heading','Threads')

@section('content')

    @include('thread.partial.thread-list')

@endsection