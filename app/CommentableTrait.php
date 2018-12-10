<?php
/**
 * Created by PhpStorm.
 * User: mhr
 * Date: 09-Dec-18
 * Time: 8:33 PM
 */

namespace App;


trait CommentableTrait
{

    public function addComment($body){
            $comment = new Comment();
            $comment->body = $body;
            $comment->user_id = auth()->user()->id;



            $this->comments()->save($comment);

    }

}