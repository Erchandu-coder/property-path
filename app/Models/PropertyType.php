<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    //
    protected $fillable = ['property_name', 'status'];

    public function properties(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_type_id');
    }
}
