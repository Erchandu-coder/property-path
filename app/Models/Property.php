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
        'district_id',
        'property_type_id',
        'status',
    ];
    // public function proptype(): HasMany
    // {
    //     return $this->hasOne(PropertyType::class, 'property_type_id');
    // }
    // public function state(): HasOne
    // {
    //     return $this->hasOne(State::class, 'state_id');
    // }
    // public function cities(): HasOne
    // {
    //     return $this->hasOne(City::class, 'city_id');
    // }
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
