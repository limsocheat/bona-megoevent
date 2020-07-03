<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoothType extends Model
{
    protected $fillable = [
        'id', 'name', 'pricing', 'total','vip_speech','vip_moderator','ads_event','banner_ads_homepage','number_products','auction','leads','live_chat','surveys','description'
    ];
}
