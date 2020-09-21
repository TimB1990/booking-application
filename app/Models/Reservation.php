<?php

namespace App\Models;

use App\Models\Guest;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\MeetingRoom;
use App\Models\Accommodation;
use App\Models\ReservableAsset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// has polymorphic relationships with either meetingroom, residence or reservable

class Reservation extends Model
{
    use HasFactory;
    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }

    public function reservable(){
        return $this->morpthTo();
    }

    public function meetingsRooms(){
        return $this->hasMany(MeetingRoom::class);
    }

    public function reservableAssets(){
        return $this->hasMany(ReservableAsset::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function guest(){
        return $this->belongsTo(Guest::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
    
}
