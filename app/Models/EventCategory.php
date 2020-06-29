<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $fillable = [
        'name', 'description', 'active',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'category_id');
    }

    public function upcoming_events()
    {
        return $this->hasMany(Event::class, 'category_id')->whereDate('start_date', '>', date('Y-m-d'));
    }
}
