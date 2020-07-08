<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    protected $fillable = [
        'date', 'start_time', 'end_time'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getDisplayDateAttribute()
    {
        return Carbon::parse($this->date)->format('jS M Y');
    }

    public function getDisplayStartTimeAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->start_time)->format('g:i a');
    }

    public function getDisplayEndTimeAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->end_time)->format('g:i a');
    }
}
