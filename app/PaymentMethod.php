<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'account_name', 'account_number', 'account_type', 'account_vendor'
    ];
}
