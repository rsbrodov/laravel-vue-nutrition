<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDishes extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function dishes(){
        return $this->belongsTo(Dishes::class);
    }
}
