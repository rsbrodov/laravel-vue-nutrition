<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Day;
use App\Models\MenuDays;
use App\Models\MenuDishes;
use App\Models\MenuNutrition;
use App\Models\Nutrition;
use App\Services\MenusDishesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuDishesController extends Controller
{
    public $service;

    public function __construct(MenusDishesService $service)
    {
        $this->service = $service;
    }
    

    public function index(Request $request)
    {
        $menus_dishes = MenuDishes::with('dishes')->where(['menu_id' => $request->form['menu_id'], 'nutrition_id' => $request->form['nutrition_id'], 'days_id' => $request->form['days_id']])->get();
        return $menus_dishes;
    }

    
    public function store(Request $request)
    {
        $data = $request->form;
        $data['cycle'] = 1;
        $new_menu = MenuDishes::create($data);
        return MenuDishes::where('id', $new_menu->id)->get();
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
    public function destroy($id)
    {
        $existing_item = MenuDishes::find($id);
        $existing_item->delete();
        return response(null, Response::HTTP_NO_CONTENT);
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

    public function getReport(Request $request)
    {
        $result = $this->service->CalculateMenuInfo($request['menu_id']);
        return $result;
    }
}
