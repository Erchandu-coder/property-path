<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function proptype(): HasMany
    {
        return $this->hasMany(PropertyType::class, 'property_type_id');
    }
}
