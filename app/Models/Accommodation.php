<?php

namespace App\Models;

use App\Models\User;
use App\Models\Facility;
use App\Models\MeetingRoom;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accommodation extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function meetingRooms(){
        return $this->hasMany(MeetingRoom::class);
    }

    public function issues(){
        return $this->morphMany('App\Models\Issue', 'issueable');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function services(){
        return $this->morphToMany('App\Models\Service', 'serviceable');
    }

    public function facilities(){
        return $this->hasMany(Facility::class);
    }
}
