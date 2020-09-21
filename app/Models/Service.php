<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// has polymorphic relationship with either reservation or residence

class Service extends Model
{
    use HasFactory;
    public function accommodation(){
        return $this->morphedByMany('App\Models\Accommodation', 'serviceable');
    }

    public function residences(){
        return $this->morphedByMany('App\Models\Residence', 'serviceable');
    }

}
