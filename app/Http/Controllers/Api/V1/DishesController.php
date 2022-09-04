<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\DishesRequest;
use App\Http\Resources\DishesResource;
use App\Models\CulinaryProcessing;
use App\Models\Dishes;
use App\Models\DishesCategory;
use Illuminate\Http\Response;
use App\Services\DishesService;

class DishesController extends Controller
{
    public $service;

    public function __construct(DishesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $dishes = DishesResource::collection(Dishes::with('dishes_categories', 'recipes_collections')->get());
        return $dishes;
    }

    
    public function store(DishesRequest $request)
    {
        $new_dish = Dishes::create($request->validated());
        return new DishesResource($new_dish);
    }

   
    
    public function destroy($id)
    {
        $existing_item = Dishes::find($id);
        $existing_item->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function dishesCategories()
    {
        $dishes_categories = DishesCategory::orderBy('sort', 'asc')->get();
        return $dishes_categories;
    }

    /*public function recipesCollections()
    {
        $recipes_collections = RecipesCollection::all();
        return $recipes_collections;
    }*/
    public function culinaryProcessings()
    {
        $culinary_processings = CulinaryProcessing::all();
        return $culinary_processings;
    }

    public function copyDish($id)
    {
        $result = $this->service->copy($id);
        return new DishesResource($result);
    }

    public function oneDish($id)
    {
        $dish = Dishes::find($id)->with('dishes_categories', 'recipes_collections')->get();
        return DishesResource::collection($dish);
    }

    public function getTechmap($menu_dishes_id)
    {
        $result = $this->service->techmap_menu_dishes($menu_dishes_id);
        return $result;
    }
}
