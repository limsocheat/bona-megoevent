<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventExhibitor extends Pivot
{
    protected $fillable = [
        'status'
    ];
}
