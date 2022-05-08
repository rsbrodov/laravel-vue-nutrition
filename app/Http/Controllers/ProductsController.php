<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Dishes;
use App\Models\ProductsCategory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('products_categories')->get();
        return $products;
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
        $new_products = New Products();
        $new_products->name = $request->form['name'];
        $new_products->products_categories_id = $request->form['category_id'];
        $new_products->products_subcategories_id = 1;
        $new_products->sort = 0;
        $new_products->water = $request->form['water'];
        $new_products->protein = $request->form['protein'];
        $new_products->fat = $request->form['fat'];
        $new_products->carbohydrates_total = $request->form['carbohydrates_total'];

        $new_products->na = $request->form['na'];
        $new_products->k = $request->form['k'];
        $new_products->ca = $request->form['ca'];
        $new_products->mg = $request->form['mg'];
        $new_products->p = $request->form['p'];
        $new_products->fe = $request->form['fe'];
        $new_products->i = $request->form['i'];
        $new_products->se = $request->form['se'];

        $new_products->vitamin_a = $request->form['vitamin_a'];
        $new_products->vitamin_b1 = $request->form['vitamin_b1'];
        $new_products->vitamin_b2 = $request->form['vitamin_b2'];
        $new_products->vitamin_c = $request->form['vitamin_c'];
        $new_products->vitamin_d = $request->form['vitamin_d'];
        $new_products->save();
        return Products::find($new_products->id)->with('products_categories')->get();
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
        $existing_item = Products::find($id);
        if($existing_item){
            $existing_item->delete();
            return 'Item saccessufuly delete';
        }
        return 'Item not found';
    }
    public function roles()
    {
        /*Role::create(['name' =>'writer']);
        Permission::create(['name' =>'write']);*/
        //return 'ok';
        $role = Role::findById(2);//функциявозврвзначении first
        $permision= Permission::findById(1);//функцвозврвзначении first
        $role->givePermissionTo($permision);
        return 'ok';

    }

    public function productsCategory()
    {
        $products_category = ProductsCategory::all();
        return $products_category;
    }
}
