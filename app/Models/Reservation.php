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
    protected $guarded = [];

    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }

    public function residences(){
        return $this->morphedByMany('App\Models\Residence', 'reservable')->withPivot([
            'check_in','check_out'
        ]);
    }

    public function meetingsRooms(){
        return $this->morphedByMany('App\Models\MeetingRoom', 'reservable')->withPivot([
            'check_in','check_out'
        ]);
    }

    public function assets(){
        return $this->morphedByMany('App\Models\Asset', 'reservable')->withPivot([
            'check_in','check_out'
        ]);
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
