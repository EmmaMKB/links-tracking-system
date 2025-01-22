<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'full_name',
        'employee_id',
        'phone',
        'email',
        'hire_date',
        'function',
        'image_path',
    ];
}
