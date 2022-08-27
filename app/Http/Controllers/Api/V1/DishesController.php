<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\CulinaryProcessing;
use App\Models\Dishes;
use App\Models\DishesCategory;
use App\Models\DishesProducts;
use App\Models\RecipesCollection;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishes::with('dishes_categories', 'recipes_collections')->get();
        return $dishes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_dish = New Dishes();
        $new_dish->name = $request->form['name'];
        $new_dish->dishes_categories_id = $request->form['dishes_categories_id'];;
        $new_dish->recipes_collections_id = $request->form['recipes_collections_id'];
        $new_dish->description = $request->form['description'];
        $new_dish->culinary_processings_id = $request->form['culinary_processings_id'];
        $new_dish->yield = $request->form['yield'];
        $new_dish->dishes_characters = $request->form['dishes_characters'];
        $new_dish->techmap_number = $request->form['techmap_number'];
        $new_dish->dishes_characters = $request->form['dishes_characters'];
        $new_dish->save();
        return Dishes::find($new_dish->id)->with('dishes_categories', 'recipes_collections')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_item = Dishes::find($id);
        if($existing_item){
            $existing_item->delete();
            return 'Item saccessufuly delete';
        }
        return 'Item not found';
    }

    public function dishesCategories()
    {
        $dishes_categories = DishesCategory::orderBy('sort', 'asc')->get();
        return $dishes_categories;
    }

    public function recipesCollections()
    {
        $recipes_collections = RecipesCollection::all();
        return $recipes_collections;
    }
    public function culinaryProcessings()
    {
        $culinary_processings = CulinaryProcessing::all();
        return $culinary_processings;
    }

    public function copyDish($id)
    {
        $dish = Dishes::find($id);
        $new_dish = new Dishes();
        $new_dish->name = $dish->name.'(копия)';
        $new_dish->dishes_categories_id = $dish->dishes_categories_id;
        $new_dish->recipes_collections_id = $dish->recipes_collections_id;
        $new_dish->description = $dish->description;
        $new_dish->culinary_processings_id = $dish->culinary_processings_id;
        $new_dish->yield = $dish->yield;
        $new_dish->dishes_characters = $dish->dishes_characters;
        $new_dish->techmap_number = $dish->techmap_number;
        $new_dish->save();
        $dishes_products = DishesProducts::where('dishes_id', $id)->get();
        if(!empty($dishes_products)){
            foreach($dishes_products as $dishes_product){
                $new = new DishesProducts();
                $new->dishes_id = $new_dish->id;
                $new->products_id = $dishes_product->products_id;
                $new->net_weight = $dishes_product->net_weight;
                $new->gross_weight = $dishes_product->gross_weight;
                $new->save();
            }
        }
        return $new_dish;
    }

    public function oneDish($id)
    {
        $dish = Dishes::with('dishes_categories', 'recipes_collections')->where('id', $id)->get();
        return $dish;
    }
}
