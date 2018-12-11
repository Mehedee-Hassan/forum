<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App;
use App\Thread;
use App\Notifications\RepliedToThread;



class CommentController extends Controller
{



    public function addThreadComment(Request $request,Thread $thread){




        $this->validate($request,[
            'body' => 'required'
        ]);
//
//        $comment = new Comment();
//        $comment->body = $request->body;
//        $comment->user_id = auth()->user()->id;
//
//
//
//        $thread->comments()->save($comment);




        $thread->addComment($request->body);

//        dd($thread->user);

        $thread->user->notify(new RepliedToThread($thread));


//        dd($thread->user);

        return back()->with('msg','comment created');


    }




    public function addReplyComment(Request $request, Comment $comment){

        $this->validate($request,[
            'body' => 'required'
        ]);

//        $reply = new Comment();
//        $reply->body = $request->body;
//        $reply->user_id = auth()->user()->id;
//
//
//
//        $comment->comments()->save($reply);



        $comment->addComment($request->body);


        return back()->with('msg','comment created');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        if(auth()->user()->id!= $comment->user_id){
            abort('401');
        }
        $this->validate($request,[
           'body'=>'required'
        ]);


        $comment->update($request->all());

        return back()->with('msg','comment updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {

        if(auth()->user()->id!= $comment->user_id){
            abort('401');
        }

       $comment->delete();
        return back()->with('msg','comment deleted!!');

    }
}
