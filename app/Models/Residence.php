<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Residence extends Model
{
    use HasFactory;

    public function issues(){
        return $this->morphMany('App\Models\Issue', 'issuable');
    }

    public function services(){
        return $this->morphToMany('App\Models\Service', 'serviceable');
    }

    public function reservations(){
        return $this->morphMany('App\Models\Reservation', 'reservable');
    }
}
