@extends('layouts.front')


@section('content')

    <h4>{{ $thread->subject  }}</h4>
    <hr>

    <div class="thread-details">
        <p>{!!  \Michelf\Markdown::defaultTransform($thread->thread ) !!}</p>
    </div>


    @if(auth()->user()->id == $thread->user_id)
        <div class="action">
            <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>

            <form action="{{ route('thread.destroy',$thread->id) }}" method="post" class="inline-it">
                {{ csrf_field() }}
                {{method_field('DELETE')}}
                <input class="btn btn-xs btn-danger" type="submit" value="Delete"/>
            </form>

        </div>
    @endif
    @endsection