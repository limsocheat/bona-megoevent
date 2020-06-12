<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'avatar', 'job_title', 'address', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
