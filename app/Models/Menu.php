<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function nutritions(){
        //return $this->hasMany(MenuNutrition::class);
        return $this->hasMany(MenuNutrition::class, 'menu_id', 'id')
            ->join('nutritions', 'nutritions.id', '=', 'menu_nutrition.nutrition_id')
            ->select('menu_nutrition.*', 'nutritions.name AS nutrition_name')
            ->get();
    }

    public function days(){
        return $this->hasMany(MenuDays::class);
    }
}
