<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoothType extends Model
{
    protected $fillable = [
        'id', 'name', 'pricing', 'total', 'description'
    ];
}
