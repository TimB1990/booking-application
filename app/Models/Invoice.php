<?php

namespace App\Models;

use App\Models\InvoiceLine;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function invoiceLines(){
        return $this->hasMany(InvoiceLine::class);
    }
}
