<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'index',
        'section_id',
        'latitude',
        'longitude',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
