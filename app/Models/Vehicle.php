<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'image',
        'service_id',
        'persons_capacity',
        'base_fare' ,
        'cost_per_minute',
        'cost_per_mile' ,
        'booking_fee',
    ];
}
