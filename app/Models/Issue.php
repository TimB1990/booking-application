<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Issue has polymorphic relationship with either residence, reservable or accommodation

class Issue extends Model
{
    use HasFactory;

    public function issueable(){
        return $this->morpthTo();
    }
}
