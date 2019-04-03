<?php

namespace App;

class BalanceHistory extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
