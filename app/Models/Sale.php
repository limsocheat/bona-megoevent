<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id', 'sale_amount', 'tax_amount','description'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_products', 'sale_id', 'product_id')
            ->withPivot([
                'quantity',
                'price',
            ]);
    }

    public function sale_products()
    {
        return $this->hasMany(SaleProduct::class);
    }

    public function getTotalAttribute()
    {
        $total  = 0;
        $products = $this->products;

        foreach ($products as $item) {
            $subtotal   = $item['quantity'] * $item['price'];
            $total      += $subtotal;
        }

        return $total;
    }

    public function getDisplayCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('jS M Y');
    }
}
