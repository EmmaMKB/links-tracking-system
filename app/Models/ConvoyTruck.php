<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvoyTruck extends Model
{
    use HasFactory;

    protected $fillable = [
        'convoy_id',
        'truck_id',
    ];
}
