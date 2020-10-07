<?php

namespace App\Models;

use App\Models\Reservation;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Residence extends Model
{
    use HasFactory;

    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }

    public function issues(){
        return $this->morphMany('App\Models\Issue', 'issueable');
    }

    public function services(){
        return $this->morphToMany('App\Models\Service', 'serviceable');
    }

    public function reservations(){
        return $this->morphToMany('App\Models\Reservation', 'reservable');
    }
}
