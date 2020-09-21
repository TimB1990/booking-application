<?php

namespace App\Models;

use App\Models\Residence;
use App\Models\Reservation;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingRoom extends Model
{
    use HasFactory;
    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }

    public function reservations(){
        return $this->morphToMany('App\Models\Reservation', 'reservable');
    }

    public function services(){
        return $this->morphToMany('App\Models\Service', 'serviceable');
    }
}
