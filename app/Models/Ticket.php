<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'code'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
