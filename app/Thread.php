<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    use CommentableTrait;

    protected $guarded = [];



    public function user(){

        return $this->belongsTo(User::class);
    }


    public function comments(){
        return $this->morphMany(Comment::class,'commentable')->latest();
    }

}
