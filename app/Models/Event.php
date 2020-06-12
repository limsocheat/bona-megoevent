<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'mode',
        'event_experience_id', 'event_team_id', 'event_frequency_id',
        'event_attendance_id', 'location_id', 'type_id', 'category_id',
        'name', 'start_date', 'start_time', 'end_date', 'end_time',
        'location', 'description'
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
}
