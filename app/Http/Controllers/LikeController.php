<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Log;

class LikeController extends Controller
{
    
	public function toggleLike(){

		$commentId = Input::get('commentId');
		$comment = \App\Comment::find($commentId);

		Log::info("comment Id : ".$commentId." ".auth()->user()->id." id()".auth()->id());


		//$userLike = $comment->likes()->where('user_id',auth()->user()->id)->where('likable_id',$commentId)->first();

		//Log::info("like: ".$userLike->likable_id);


		Log::info($comment->isLiked()?"true":"false");

		$likeCount = $comment->isLiked(); 
		if(!$likeCount){

			Log::info("like:like controller");
			$comment->likeIt();


			return response()->json(['status'=>'like']);
		}
		else{
			Log::info("unlike:like controller");
			$comment->unLike();
			return response()->json(['status'=>'unlike']);
		}

	
		return response()->json(['status'=>'success']);
	}


	public function likeCount(){

		$count= 0;
		$commentId = Input::get('commentId');
		$comment = \App\Comment::find($commentId);

		if(is_null($commnet))
			$count = 0;
		else
			$count = $commnet->likeCount();



		return response()->json(['count'=>$count]);
	}

}
