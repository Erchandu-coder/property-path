<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'state_id',
        'city_id',
        'district_name',
        'pin_code',
        'status'
    ];
}
