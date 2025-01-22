<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}

