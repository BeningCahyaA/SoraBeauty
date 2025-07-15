<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'customer_id',
        'total',
        'name',
        'address',
        'phone',
        'status',
        'tracking_number',
    ];
}
