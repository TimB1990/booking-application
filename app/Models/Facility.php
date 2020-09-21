<?php

namespace App\Models;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;
    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }
}
