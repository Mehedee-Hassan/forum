<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{


	public function likable()
	{
		return $this->motphTo();
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
