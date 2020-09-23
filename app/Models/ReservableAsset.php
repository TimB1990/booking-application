<?php

namespace App\Models;

use App\Models\Accommodation;
use App\Models\ReservableCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservableAsset extends Model
{
    use HasFactory;
    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }

    public function issues(){
        return $this->morphMany('App\Models\Issue', 'issueable');
    }

    public function reservations(){
        return $this->morphToMany('App\Models\Reservation', 'reservable');
    }

    public function reservableCategories(){
        return $this->belongsToMany(ReservableCategory::class);
    }
}
