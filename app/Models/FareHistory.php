<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FareHistory extends Model
{
    use HasFactory;

    protected $fillable = ['destination_address', 'origin_address', 'data', 'user_id', 'points'];
}
