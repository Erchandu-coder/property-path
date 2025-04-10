<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class State extends Model
{
    protected $fillable = [
        'state_name',
        'status',
    ];
}
