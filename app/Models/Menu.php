<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function nutritions(){
        //return $this->hasMany(MenuNutrition::class);
        return $this->hasManyThrough(Nutrition::class, MenuNutrition::class);
    }

    public function days(){
        return $this->hasMany(MenuDays::class);
    }
}
