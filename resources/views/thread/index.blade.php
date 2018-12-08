@extends('layouts.front')


@section('heading')

    <a class="btn btn-primary pull-right"  href="{{route('thread.create')}}">Create Thread</a>
    @endsection

@section('content')
    <h2>Threads</h2>

    @include('thread.partial.thread-list')

@endsection