<?php

namespace App\Models;

use Akaunting\Money\Money;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
    [
        'id', 'category_id', 'name', 'image', 'price', 'quantity', 'color', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? url($this->image) : url('/images/camera.png');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_products', 'product_id', 'sale_id');
    }

    public function getSoldQuantityAttribute()
    {
        return $this->sales()->sum('quantity');
    }

    public function getAvailableQuantityAttribute()
    {
        return $this->quantity - $this->sold_quantity;
    }

    public function events()
    {
        return $this
            ->belongsTo(Event::class, 'event_products', 'product_id', 'event_id')
            ->withPivot('quantity', 'price');
    }

    public function getDisplayNameAttribute()
    {
        return $this->name . " (" . Money::SGD($this->price) . ")";
    }
}
