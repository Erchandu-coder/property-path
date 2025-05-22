<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = [
        'city_name',
        'state_id',
        'status',
    ];
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'city_id');
    }
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'property_id');
    }
}
