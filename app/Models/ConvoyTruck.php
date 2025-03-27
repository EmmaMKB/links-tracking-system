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

    public function convoy()
    {
        return $this->belongsTo(Convoy::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
