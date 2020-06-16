<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'mode', 'organizer_id',
        'event_experience_id', 'event_team_id', 'event_frequency_id',
        'event_attendance_id', 'location_id', 'type_id', 'category_id',
        'name', 'start_date', 'start_time', 'end_date', 'end_time',
        'location', 'description', 'diamond_max', 'gold_max', 'silver_max', 'bronze_max', 'pax_min', 'pax_max',
        'pax_min_last_date', 'price', 'early_bird_price', 'early_bird_date', 'group_price', 'group_min_pax'
    ];
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function type()
    {
        return $this->belongsTo(EventType::class, 'type_id');
    }

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }

    public function organizers()
    {
        return $this->belongsTo(Event::class, 'event_organizer');
    }

    public function banners()
    {
        return $this->morphMany(Banner::class, 'bannerable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'vidable');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? url($this->image) : url('/events/1.jpg');
    }
}
