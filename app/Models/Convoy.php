<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function trucks()
    {
        return $this->hasMany(Truck::class,);
    }

    public function status_colour(): string
    {

        $interval = Carbon::now()->diffInMinutes($this->updated_at);
        $colour = "success";

        if ($this->status == "Parked") {
            if ($interval < 360) {
                $colour = "success";
            } else {
                $colour = "danger";
            }
        } elseif ($this->status == "Moving") {
            if ($interval < 30) {
                $colour = "success";
            } else {
                $colour = "danger";
            }
        } elseif ($this->status == "BreakDown") {
            if ($interval < 240) {
                $colour = "success";
            } else {
                $colour = "danger";
            }
        } elseif ($this->status == "Queued") {
            if ($interval < 120) {
                $colour = "success";
            } else {
                $colour = "danger";
            }
        } elseif ($this->status == "Questionned") {
            if ($interval < 10) {
                $colour = "success";
            } else {
                $colour = "danger";
            }
        }

        return $colour;
    }
}
