<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /*public function nutritions(){
        //return $this->hasMany(MenuNutrition::class);
        return $this->hasMany('App\Models\MenuNutrition', 'menu_id', 'id')
            ->join('nutritions', 'nutritions.id', '=', 'menu_nutrition.nutrition_id')
            ->select('menus.*', 'menu_nutrition.*', 'nutritions.*')
            ->get();
    }*/

    public function days(){
        return $this->hasMany(MenuDays::class);
    }
}
