<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id', 'payment_method_id', 'amount', 'balance', 'sender_name', 'status', 'unique_code', 'expired_date'
    ];
}
