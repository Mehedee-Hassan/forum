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

    <br>
    <br>
    <div class="comment-list">
        @foreach($thread->comments as $comment)
            {{--comment--}}
            <h4>{{ $comment->body }}</h4>
            <lead> <strong>-{{ $comment->user->name }}</strong></lead>
            <br>
            <br>

            @if(auth()->user()->id == $comment->user->id)
                <div class="action">
    {{--                <a href="{{route('comment.update',$comment->id)}}" class="btn btn-info btn-xs">Edit</a>--}}

                    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{ $comment->id }}">edit</a>


                    <div class="modal fade" id="{{ $comment->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Edit Comment</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">

                                        {{ csrf_field() }}
                                        {{ method_field('put') }}

                                        <legend>Comment</legend>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="body" id="body" placeholder="comment..."  value="{{ $comment->body }}"/>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <form action="{{ route('comment.destroy',$comment->id) }}" method="post" class="inline-it">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <input class="btn btn-xs btn-danger" type="submit" value="Delete"/>
                    </form>

                </div>
            @endif


            {{--reply to comment--}}
                @foreach($comment->comments as $reply)
                    <div class="small well text-info">
                        <p>{{$reply->body}}</p>
                        --<lead>{{ $reply->user->name }}</lead>

                        <br>
                        <br>


                        @if(auth()->user()->id == $comment->user->id)
                            <div class="action">

                                <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{ $reply->id }}">Edit reply</a>


                                <div class="modal fade" id="{{ $reply->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Edit Reply</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('comment.update',$reply->id)}}" method="post" role="form">

                                                    {{ csrf_field() }}
                                                    {{ method_field('put') }}

                                                    <legend>Save</legend>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="body" id="body" placeholder="comment..."  value="{{ $reply->body }}"/>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary">Reply</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <form action="{{ route('comment.destroy',$reply->id) }}" method="post" class="inline-it">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <input class="btn btn-xs btn-danger" type="submit" value="Delete Reply"/>
                                </form>

                            </div>
                        @endif


                    </div>
                @endforeach


            {{--reply form--}}
            <div  class="reply-form">

                <form action="{{route('replycomment.store',$comment)}}" method="post" role="form">

                    {{ csrf_field() }}

                    <legend><small>Reply</small></legend>
                    <div class="form-group">
                        <input type="text" class="form-control" name="body" id="body" placeholder="reply..." />
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                </form>
                <br>


            </div>
            <hr/>
        @endforeach
    </div>

    <br>

    <div  class="comment-form">

        <form action="{{route('threadcomment.store',$thread)}}" method="post" role="form">

            {{ csrf_field() }}

            <legend>Comment</legend>
            <div class="form-group">
                <input type="text" class="form-control" name="body" id="body" placeholder="comment..." />
            </div>


            <button type="submit" class="btn btn-primary">Comment</button>
        </form>


    </div>




@endsection