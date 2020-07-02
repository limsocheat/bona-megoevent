<?php

namespace App\Models;

use App\User;
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

}
