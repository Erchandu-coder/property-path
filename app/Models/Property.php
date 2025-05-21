<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    //
    protected $fillable = [
        'special_note',
        'date',
        'owner_name',
        'contact_number',
        'address',
        'premise',
        'rent',
        'availability',
        'condition',
        'sqFt_sqyd',
        'key',
        'brokerage',
        'property_status',
        'description_1',
        'description_2',
        'state_id',
        'city_id',
        'property_type_id',
        'status',
        'go_live_at',
    ];
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function propertype(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
