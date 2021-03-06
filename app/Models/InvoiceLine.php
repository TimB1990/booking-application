<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceLine extends Model
{
    use HasFactory;
    function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
