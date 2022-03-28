<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\MenuDays;
use App\Models\MenuDishes;
use App\Models\MenuNutrition;
use App\Models\Nutrition;
use Illuminate\Http\Request;

class MenuDishesController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuDishes  $menuDishes
     * @return \Illuminate\Http\Response
     */
    public function show(MenuDishes $menuDishes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuDishes  $menuDishes
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuDishes $menuDishes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuDishes  $menuDishes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuDishes $menuDishes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuDishes  $menuDishes
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuDishes $menuDishes)
    {
        //
    }

    public function getNutritions($id)
    {
        $menus_nutrition = MenuNutrition::where('menu_id', $id)->get();
        $result = [];
        foreach($menus_nutrition as $menu_nutrition){
            $result[$menu_nutrition->nutrition_id] = Nutrition::where('id', $menu_nutrition->nutrition_id)->first()->name;
        }
        return $result;
    }

    public function getDays($id)
    {
        $menus_days = MenuDays::where('menu_id', $id)->get();
        $result = [];
        foreach($menus_days as $menus_day){
            $result[$menus_day->days_id] = Day::where('id', $menus_day->days_id)->first()->name;
        }
        return $result;
    }
}
