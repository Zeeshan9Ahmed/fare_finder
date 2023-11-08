<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRideChargeStateWise extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id' ,
        'state_id' ,
        'base_fare' ,
        'cost_per_minute' ,
        'cost_per_mile' ,
        'booking_fee' ,
    ];
}
