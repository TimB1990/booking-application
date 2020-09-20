<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory;
    public function reservation(){
        $this->belongsTo(Reservation::class);
    }

    public function issues(){
        $this->hasMany(Issue::class);
    }

    public function services(){
        $this->hasMany(Service::class);
    }
}
