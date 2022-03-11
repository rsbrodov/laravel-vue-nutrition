<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishesProducts extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->belongsTo(Dishes::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
