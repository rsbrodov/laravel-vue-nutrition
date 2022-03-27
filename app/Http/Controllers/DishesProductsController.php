<?php

namespace App\Http\Controllers;

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
        $dishes_products = New DishesProducts();
        $dishes_products->dishes_id = $request->form['dishes_id'];
        $dishes_products->products_id = $request->form['products_id'];
        $dishes_products->net_weight = $request->form['net_weight'];
        $dishes_products->gross_weight = $request->form['gross_weight'];
        $dishes_products->save();
        return DishesProducts::where('id', $dishes_products->id)->get();
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
        //
    }

    public function productsDish($id)
    {
        $dishes_products = DishesProducts::where('dishes_id', $id)->with('dishes', 'products')->get();
        return $dishes_products;
    }
}
