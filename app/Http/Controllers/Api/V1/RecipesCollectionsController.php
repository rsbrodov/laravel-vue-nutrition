<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecipesCollection;

class RecipesCollectionsController extends Controller
{
    public function __invoke()
    {
        $recipes_collections = RecipesCollection::all();
        return $recipes_collections;
    }
}
