<?php

namespace App;

use App\Models\Company;
use App\Models\Event;
use App\Models\EventExhibitor;
use App\Models\Exhibitor;
use App\Models\Organizer;
use App\Models\Participant;
use App\Models\Profile;
use App\Models\Sale;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function organizer()
    {
        return $this->hasOne(Organizer::class);
    }

    public function exhibitor()
    {
        return $this->hasOne(Exhibitor::class);
    }

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function exhibitions()
    {
        return $this->belongsToMany(Event::class, 'event_exhibitors', 'user_id', 'event_id')
            ->using(EventExhibitor::class)
            ->withPivot([
                'status'
            ]);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function scopeIsExhibitored($query)
    {
        return $query->whereHas('exhibitions');
    }

    public function getIsExhibitorAttribute()
    {
        $result = false;

        if (count($this->exhibitions)) {
            $result = true;
        }

        return $result;
    }

    public function getExhibitorImageAttribute()
    {
        $image  = asset('/images/camera.png');

        if ($this->type == 'company' && $this->company && $this->company->logo) {
            $image  = asset($this->company->logo);
        } else if ($this->type == 'individual' && $this->profile->avatar_url) {
            $image  = asset($this->profile->avatar_url);
        }

        return $image;
    }

    public function getExhibitorNameAttribute()
    {
        $name   = $this->name;

        if ($this->type == 'company' && $this->company) {
            if ($this->company->name) {
                $name = $this->company->name;
            }
        }

        if ($this->type == 'individual') {
            if ($this->profile->first_name || $this->profile->last_name) {
                $name = $this->profile->first_name . " " . $this->profile->last_name;
            }
        }

        return $name;
    }
}
