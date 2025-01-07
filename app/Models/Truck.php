<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'horse',
        'trailer',
        'transporter',
        'dispatch_date',
        'mine_id',
        'driver',
        'client_id',
        'location_id',
        'status',
        'destination',
        'cargo',
        'comment',
    ];
}
