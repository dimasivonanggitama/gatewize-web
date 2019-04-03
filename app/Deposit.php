<?php

namespace App;


class Deposit extends Model
{
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function payment_methods(){
        return $this->belongsTo('App\PaymentMethod', 'payment_method_id');
    }
}
