<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;
    public function issues(){
        return $this->morphMany('App\Models\Issue', 'issueable');
    }

    public function reservations(){
        return $this->morphToMany('App\Models\Reservation', 'reservable');
    }
    
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
