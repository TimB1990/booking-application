<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    public function users(){
        $this->belongsToMany(User::class);
    }

    public function meetingRooms(){
        $this->hasMany(MeetingRoom::class);
    }

    public function issues(){
        $this->hasMany(Issue::class);
    }

    public function reservations(){
        $this->hasMany(Reservation::class);
    }
}
