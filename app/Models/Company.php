<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id', 'name', 'registration_number', 'description', 'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
