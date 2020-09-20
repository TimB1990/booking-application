<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// has polymorphic relationship with either reservation or residence

class Service extends Model
{
    use HasFactory;
    public function residence(){
        $this->belongsTo(Residence::class);
    }

    public function reservation(){
        $this->belongsTo(Reservation::class);
    }
}
