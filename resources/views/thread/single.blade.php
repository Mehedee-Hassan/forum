@extends('layouts.front')


@section('content')

    <h4>{{ $thread->subject  }}</h4>
    <hr>

    <div class="thread-details">
        <p>{{ $thread->thread }}</p>
    </div>


    <div class="action">
        <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>

        <a href="{{ route('thread.destroy',$thread->id) }}" methods="post" class="inline-it">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="btn btn-xs btn-danger" type="submit" value="Delete"/>
        </a>

    </div>
    @endsection