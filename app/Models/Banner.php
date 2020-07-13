<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name', 'link', 'image', 'location'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? url($this->image) : url('/uploads/camera.png');
    }

    public function bannerable()
    {
        return $this->morphTo();
    }
}
