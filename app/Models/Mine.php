<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    use HasFactory;

    protected $fillable = [
        'mine',
        'section_id',
        'latitude',
        'longitude',
    ];
}
