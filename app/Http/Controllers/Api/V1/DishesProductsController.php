<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\DishesProductsResource;
use App\Models\DishesProducts;
use Illuminate\Http\Request;

class DishesProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    public function store(Request $request)
    {
        $dishes_products = DishesProducts::create($request->form);
        return new DishesProductsResource($dishes_products);//DishesProducts::where('id', $dishes_products->id)->get();
    }

    public function productsDish($id)
    {
        $dishes_products = DishesProducts::where('dishes_id', $id)->with('dishes', 'products')->get();
        return $dishes_products;
    }
}
