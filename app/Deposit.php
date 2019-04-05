<?php

namespace App;


class Deposit extends Model
{
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function depositConfirmations()
    {
        return $this->hasMany(DepositConfirmation::class);
    }
}
