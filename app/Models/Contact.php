<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = [
        'name', 'email', 'contact_number', 'country', 'company_name', 'type','message'
    ];
}
