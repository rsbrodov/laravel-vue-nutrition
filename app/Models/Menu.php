<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function nutritions(){
        //return $this->hasManyThrough(Nutrition::class, MenuNutrition::class);
        return $this->belongsToMany(Nutrition::class, 'menu_nutrition', 'menu_id', 'nutrition_id');
    }

    public function days(){
        return $this->belongsToMany(Day::class, 'menu_days', 'menu_id', 'days_id');
    }
}
