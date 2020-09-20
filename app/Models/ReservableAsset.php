<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservableAsset extends Model
{
    use HasFactory;
    public function accommodation(){
        $this->belongsTo(Accommodation::class);
    }

    public function issues(){
        $this->hasMany(Issue::class);
    }
}
