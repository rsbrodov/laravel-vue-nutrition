<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuNutrition extends Model
{
    use HasFactory;

    public function nutritions(){
        return $this->belongsTo(Nutrition::class);
    }
}
