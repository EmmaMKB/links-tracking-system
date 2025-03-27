<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convoy extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'status',
        'controller_id',
        'escort_id',
        'location_id',
        'state',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function controller()
    {
        return $this->belongsTo(Employee::class);
    }

    public function escort()
    {
        return $this->belongsTo(Employee::class);
    }

    public function trucks() {
        return $this->hasMany(Truck::class, );
    }


}
