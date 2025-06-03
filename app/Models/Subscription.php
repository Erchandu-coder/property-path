<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 
        'order_id',
        'plan_type',
        'price',
        'mobile_number',
        'payment_receipt',
        'plan_renew_date',
        'plan_expire_date',
        'payment_status'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
