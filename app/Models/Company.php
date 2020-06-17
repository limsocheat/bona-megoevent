<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id', 'name', 'registration_number', 'logo', 'description', 'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo ? url('/upload/' . $this->logo) : "http://simpleicon.com/wp-content/uploads/account.png";
    }
}
