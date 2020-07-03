<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $table = 'sale_products';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function sale()
    {
        return $this->belongsTo(Product::class);
    }

    
}
