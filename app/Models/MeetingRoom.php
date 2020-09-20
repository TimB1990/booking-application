<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory;
    public function accommodation(){
        $this->belongsTo(Accommodation::class);
    }

    public function reservation(){
        $this->belongsTo(Reservation::class);
    }

    public function residences(){
        $this->hasMany(Residence::class);
    }
}
