<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// has polymorphic relationship with either reservation or residence

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function accommodation(){
        return $this->morphedByMany('App\Models\Accommodation', 'serviceable');
    }

    public function residences(){
        return $this->morphedByMany('App\Models\Residence', 'serviceable');
    }

    public function meetingRooms(){
        return $this->morphedByMany('App\Models\MeetingRoom', 'serviceable');
    }

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

}
