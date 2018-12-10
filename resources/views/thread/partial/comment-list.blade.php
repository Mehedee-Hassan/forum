            {{--comment--}}
            <h4>{{ $comment->body }}</h4>

            

            @if($thread->solution == $comment->id)
            {{--<div class="debug">debug</div>--}}
                <button class="btn btn-success btn-sm pull-right">Solution</button>
                    
            @else
                {{--<div class="debug">debug2</div>--}}

                @if(auth()->check())
                    @if(auth()->user()->id == $thread->user_id)
                       {{--  <form action="{{ route('markAsSolution') }}" method='post'>
                            <input type="hidden" class="" name="threadId" value="{{$thread->id}}">
                            <input type="hidden" class="" name="solutionId" value="{{$comment->id}}">
                            <input type="submit" class="btn btn-success btn-sm pull-right" value="Mark as solution" />

                        </form> --}}
                    <div id="markItSolution" class="btn btn-success pull-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)">Mark as solution</div>


                    @endif
                @endif
            @endif
            <lead> <strong>-{{ $comment->user->name }}</strong></lead>
            <br>
            <br>
            <div class="action">

            @if(auth()->user()->id == $comment->user->id)
                
    
    {{--<a href="{{route('comment.update',$comment->id)}}" class="btn btn-info btn-xs">Edit</a>--}}

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


                                        <button type="submit" class="btn btn-primary">Save</button>
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
                  
              
            @endif
              <button type="button" class="btn btn-info btn-xs" value="reply" onclick="toggleReply({{ $comment->id }})">Reply</button>
              
              <span class="pull-right">
                  <span id="likebutton" class="glyphicon glyphicon-heart font25px mouse-pointer zindexup10 
                                    @if($comment->likes()->where('user_id',auth()->id())->count())
                                        red-text
                                    @endif
                  " onclick="likeIt('{{$comment->id}}',this)">
                          
                  </span>
                   <span id="{{$comment->id}}-count" class="label label-default overlap10px">{{$comment->likes()->count()}}<span>
               </span>
            </div>

@section('js')
<script type="text/javascript">
    
        function markAsSolution(threadId,solutionId,element){
            var csrfToken = '{{csrf_token()}}';
            $.post('{{route('markAsSolution')}}',
                    {
                        solutionId:solutionId,
                        threadId: threadId,
                        _token:csrfToken  
                    },function(data){
                        console.log(data);

                        if(data['status']=='success'){
                            $(element).text('solution');
                        }

                    });
        }
         function toggleReply(commentId) {

            console.log('test2');
            $('.reply-form-'+commentId).toggleClass('hidden');
        }

        function likeIt(commentId,elem){
            var csrfToken = '{{csrf_token()}}';
            var likeCount = $('#'+commentId+'-count').text();

            console.log(likeCount);
            $.post('{{route('likeIt')}}',
                    {
                        commentId:commentId,
                        _token:csrfToken  
                    },function(data){
                        console.log(data);
                        
                        if(data['status']=='like'){
                            $(elem).css({color:'red'});
                            var tt = parseInt(likeCount)+1;
                            $('#'+commentId+'-count').text(tt);
                        }
                        else{
                            $(elem).css({color:'black'});

                            var tt = parseInt(likeCount)-1;
                            if(tt >= 0){
                                $('#'+commentId+'-count').text(tt);
                            }
                        }

                    });

        }

</script>

@endsection