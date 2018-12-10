<?php
/**
 * Created by PhpStorm.
 * User: mhr
 * Date: 09-Dec-18
 * Time: 8:33 PM
 */

namespace App;
use Log;
use \App\Like;

trait LikableTrait
{
	public function likes(){
		return $this->morphMany(Like::class,'likable');
	}


    public function likeit(){

    		Log::info('likeit function');

            $comment = new Like();
            $comment->user_id= auth()->user()->id;
            $this->likes()->save($comment);


            return $comment;
    }

    public function unLike(){
    		
    		Log::info('unlike function');

    		$this->likes()->where('user_id',auth()->id())->delete();
            

            return true;
    }

    public function isLiked(){


    	Log::info('isLiked funciton'.$this->likes()->where('user_id',auth()->id())->count());
    	return $this->likes()->where('user_id',auth()->id())->count();

    }


    public function countLike(){
    	return $this->likes()->count();
    }

}