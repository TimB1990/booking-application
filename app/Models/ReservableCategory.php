<?php

namespace App\Models;

use App\Models\ReservableAsset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservableCategory extends Model
{
    use HasFactory;
    public function reservableAssets(){
        return $this->BelongsToMany(ReservableAsset::class);
    }
}
