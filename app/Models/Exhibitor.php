<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    protected $fillable = [
        'user_id', 'name', 'phone', 'email', 'address', 'active'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
