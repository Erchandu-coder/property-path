<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class State extends Model
{
    protected $fillable = [
        'state_name',
        'status',
    ];
    public function properties(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'state_id');
    }
}
