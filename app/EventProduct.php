<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventProduct extends Pivot
{
    protected $table = 'event_products';

    protected $fillable = [
        'quantity', 'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
