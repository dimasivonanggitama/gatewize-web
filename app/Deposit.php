<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id', 'payment_method_id', 'amount', 'balance', 'sender_name', 'total','status', 'unique_code', 'expired_date'
    ];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function payment_methods(){
        return $this->belongsTo('App\PaymentMethod', 'payment_method_id');
    }
}
