<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'mode', 'organizer_id', 'image', 'floor_plan_image',
        'event_experience_id', 'event_team_id', 'event_frequency_id',
        'event_attendance_id', 'location_id', 'type_id', 'category_id', 'venue_id',
        'name', 'start_date', 'start_time', 'end_date', 'end_time', 'venue_level',
        'description', 'diamond_max', 'gold_max', 'silver_max', 'bronze_max', 'pax_min', 'pax_max',
        'pax_min_last_date', 'price', 'early_bird_price', 'early_bird_date', 'group_price', 'group_min_pax',
        'status'
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
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function banners()
    {
        return $this->morphMany(Banner::class, 'bannerable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'vidable');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, Purchase::class);
    }

    public function schedules()
    {
        return $this->hasMany(EventSchedule::class);
    }

    public function payment()
    {
        return $this->hasOne(EventPayment::class);
    }
    
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? url($this->image) : asset('/images/event_feature_image_placeholder.png');
    }
    public function getFloorImageAttribute(){
        return $this->floor_plan_image ? url($this->floor_plan_image) : asset('/images/event_feature_image_placeholder.png');
    }

    public function getDisplayStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('jS M Y');
    }

    public function getDisplayEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('jS M Y');
    }

    public function getDisplayEarlyBirdDateAttribute()
    {
        return Carbon::parse($this->early_bird_date)->format('jS M Y');
    }

    public function getDisplayStartTimeAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->start_time)->format('g:i a');
    }

    public function getDisplayEndTimeAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->end_time)->format('g:i a');
    }

    public function exhibitors()
    {
        return $this->belongsToMany(User::class, 'event_exhibitors', 'event_id', 'user_id')
            ->using(EventExhibitor::class)
            ->withPivot([
                'status'
            ]);
    }

    public function getTotalHoursAttribute()
    {
        $total_hours = 0;
        foreach($this->schedules as $schedule) {
            $total_hours += $schedule->total_hours;
        }
    
        return $total_hours;
    }

    public function getTotalGridBlockAttribute()
    {
        $grid = 0;
        if($this->venue && $this->venue_level) {
            $grid   = $this->venue->width * $this->venue->length * $this->venue_level;
        }
        return $grid;
    }

    public function getTotalGridBlockPriceAttribute()
    {
        return $this->total_grid_block * $this->total_hours * \Setting::get('event.grid_block_value');
    }

    public function getTotalNetPriceAttribute()
    {
        return $this->total_grid_block_price;
    }

    public function getTotalTaxAttribute() 
    {
        return $this->total_net_price * \Setting::get('event.tax_percentage') / 100;
    }

    public function getTotalFinalPriceAttribute()
    {
        return $this->total_net_price + $this->total_tax;
    }

    public function getReadOnlyAttribute()
    {
        $readonly   = false;

        if($this->payment && $this->payment->status == 'paid') {
            $readonly   = true;
        }
        return $readonly;
    }
}
