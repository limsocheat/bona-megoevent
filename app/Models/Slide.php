<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title', 'sub_title', 'image', 'location'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? url($this->image) : url('/uploads/camera.png');
    }
}
