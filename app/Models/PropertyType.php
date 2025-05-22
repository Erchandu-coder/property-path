<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class PropertyType extends Model
{
    //
    protected $fillable = ['property_name', 'status'];

    public function properties(): hasMany
    {
        return $this->hasMany(Property::class, 'property_type_id');
    }
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'property_id');
    }
}
