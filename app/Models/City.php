<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;


class City extends Model
{
    protected $fillable = [
        'city_name',
        'state_id',
        'status',
    ];
    // public function properties(): BelongsTo
    // {
    //     return $this->belongsTo(Property::class, 'city_id');
    // }
}
