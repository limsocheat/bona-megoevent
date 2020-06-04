<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'mode',
        'event_experience_id', 'event_team_id', 'event_frequency_id',
        'event_attendance_id', 'event_location_id', 'type_id', 'category_id',
        'name', 'start_date', 'start_time', 'end_date', 'end_time',
        'location', 'description'
    ];
    public function option()
    {
        return $this->belongsTo(Option::class, 'event_location_id');
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
}
