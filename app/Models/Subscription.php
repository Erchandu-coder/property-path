<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 
        'property_id',
        'order_id',
        'mobile_number',
        'payment_receipt',
        'plan_renew_date',
        'plan_expire_date',
        'payment_status'
    ];
}
