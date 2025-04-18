<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasOne;

class District extends Model
{
    protected $fillable = [
        'state_id',
        'city_id',
        'district_name',
        'pin_code',
        'status'
    ];
    // public function properties(): HasOne
    // {
    //     return $this->hasOne(Property::class, 'district_id');
    // }
}
