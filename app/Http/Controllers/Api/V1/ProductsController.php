<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ProductsResource;
use App\Models\Products;
use App\Models\Dishes;
use App\Models\ProductsCategory;
//use Facade\FlareClient\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductsResource::collection(Products::with('products_categories')->get());
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
        $data = $request->form;
        $data['products_subcategories_id'] = 1;
        $data['sort'] = 0;
        $new_products = Products::create($data);
        return new ProductsResource($new_products);
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
        $existing_item = Products::findOrFail($id);
        $existing_item->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function roles()
    {
        $role = Role::findById(2);//функциявозврвзначении first
        $permision= Permission::findById(1);//функцвозврвзначении first
        $role->givePermissionTo($permision);
        return 'ok';
    }

    public function productsCategory()
    {
        $products_category = ProductsCategory::orderBy('sort', 'asc')->get();
        return $products_category;
    }
}
