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
        'user_id',
        'location_id',
        'state',
    ];
}
