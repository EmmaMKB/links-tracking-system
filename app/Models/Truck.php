<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\Client;
use App\Models\Mine;

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

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function mine()
    {
        return $this->belongsTo(Mine::class, 'mine_id');
    }
}

