<?php

namespace App;


class Comment extends Model
{
	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}


	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
