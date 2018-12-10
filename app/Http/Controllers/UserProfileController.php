<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\User;
use App\Thread;
use App\Comment;

class UserProfileController extends Controller
{
    
	public function index(User $user){

		$threads = Thread::where('user_id',$user->id)->latest()->get();

		$comments = Comment::where('user_id',$user->id)->where('commentable_type','App\Thread')->get();

		return view('profile.index',compact('threads','comments','user'));

	}

}
