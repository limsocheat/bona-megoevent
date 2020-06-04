<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'logo', 'phone', 'address', 'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->logo ? url( $this->logo) : url('/upload/camera.png');
    }
}
// return $this->image ? url($this->image) : url('/images/placeholder.png');
