<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'avatar', 'job_title', 'address', 'phone', 'country_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? url('/upload/' . $this->avatar) : "http://simpleicon.com/wp-content/uploads/account.png";
    }
}
