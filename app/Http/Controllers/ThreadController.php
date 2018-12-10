<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ThreadController extends Controller
{


    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = \App\Thread::paginate(15);

        return view('thread.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.thread-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required|min:1',
            'type' => 'required',
            'thread' => 'required|min:10'
        ]);


//        \App\Thread::create($request->all());


        auth()->user()->threads()->create($request->except('g-recaptcha-response'));


        return redirect()->back()->with('msg','Thread Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {

        return view('thread.single',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit')->with('thread',$thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {


        if(auth()->user()->id != $thread->user_id){
            abort('401','user not authorized');
        }


        $this->validate($request,[
            'subject' => 'required|min:5',
            'type' => 'required',
            'thread' => 'required|min:20'
        ]);



        $thread->update($request->all());


        return redirect()->route('thread.show',$thread->id)->with('msg','Thread Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect()->route('thread.index')->with('msg','Thread Deleted!!');
    }



    public function markAsSolution(){
        $solutionId = Input::get('solutionId');
        $threadId=Input::get('threadId');
        $thread= \App\Thread::find($threadId);
        $thread->solution = $solutionId;

        if($thread->save()){


            if(request()->ajax()){

                return response()->json(['status'=>'success','msg'=>'Marked as solution!!']);

            }
            return back()->with('msg','Mark as solution');
        }
    }

}
