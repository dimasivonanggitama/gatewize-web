<?php

namespace App;

class Category extends Model
{
    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }
}
