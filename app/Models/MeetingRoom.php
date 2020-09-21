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

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function residences(){
        return $this->hasMany(Residence::class);
    }
}
