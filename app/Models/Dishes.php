<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;

    public function dishes_categories()
    {
        return $this->belongsTo(DishesCategory::class);
    }

    public function recipes_collections()
    {
        return $this->belongsTo(RecipesCollection::class);
    }

    /*public function dishes_products(){
        return $this->hasMany(Products::class)
    }*/
}
