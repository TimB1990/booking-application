<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// has polymorphic relationships with either meetingroom, residence or reservable

class Reservation extends Model
{
    use HasFactory;
    public function accommodation(){
        $this->belongsTo(Accommodation::class);
    }

    public function meetingsRooms(){
        $this->hasMany(MeetingRoom::class);
    }

    public function reservables(){
        $this->hasMany(ReservableAsset::class);
    }

    public function services(){
        $this->hasMany(Service::class);
    }

    public function guest(){
        $this->belongsTo(Guest::class);
    }

    public function invoice(){
        $this->hasOne(Invoice::class);
    }
    
}
