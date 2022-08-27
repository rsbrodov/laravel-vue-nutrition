<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Menu;
use App\Models\MenuDays;
use App\Models\MenuNutrition;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$menus = Menu::
        select(['menus.name as name', 'menu_nutrition.nutrition_id as nutrition_id'])->
        join('menu_nutrition', 'menu_nutrition.menu_id', '=', 'menus.id')->
        get();*/

        $menus = Menu::with('nutritions', 'days')->get();
        return $menus;
    }

    public function firstMenu()
    {
        /*$menus = Menu::
        select(['menus.name as name', 'menu_nutrition.nutrition_id as nutrition_id'])->
        join('menu_nutrition', 'menu_nutrition.menu_id', '=', 'menus.id')->
        get();*/
        $menus = Menu::first();
        //$menus = Menu::join('menu_nutrition', 'menu_nutrition.menu_id', '=', 'menus.id')->get();
        return $menus;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_menu = New Menu();
        $new_menu->name = $request->form['name'];
        $new_menu->parent_id = 0;
        $new_menu->save();

        if($request->form['days1'] == true){
            $mas_days[] = 1;
        }
        if($request->form['days2'] == true){
            $mas_days[] = 2;
        }
        if($request->form['days3'] == true){
            $mas_days[] = 3;
        }
        if($request->form['days4'] == true){
            $mas_days[] = 4;
        }
        if($request->form['days5'] == true){
            $mas_days[] = 5;
        }
        if($request->form['days6'] == true){
            $mas_days[] = 6;
        }
        if($request->form['days7'] == true){
            $mas_days[] = 7;
        }

        //nutrition
        if($request->form['nutrition1'] == true){
            $mas_nutritions[] = 1;//ЦИФРА НАПРОТИВ МАССИВА ОБОЗНАЧАЕТ ID ПРИЕМА ПИЩИ В ТАБЛИЦЕ NUTRITION_INFO!!!
        }
        if($request->form['nutrition2'] == true){
            $mas_nutritions[] = 2;
        }
        if($request->form['nutrition3'] == true){
            $mas_nutritions[] = 3;
        }
        if($request->form['nutrition4'] == true){
            $mas_nutritions[] = 4;
        }
        if($request->form['nutrition5'] == true){
            $mas_nutritions[] = 5;
        }
        if($request->form['nutrition6'] == true){
            $mas_nutritions[] = 6;
        }

        foreach($mas_days as $day){
            $model3 = new MenuDays();
            $model3->menu_id = $new_menu->id;
            $model3->days_id = $day;
            $model3->save();
        }

        foreach ($mas_nutritions as $nutrition)
        {
            $model4 = new MenuNutrition();
            $model4->menu_id = $new_menu->id;
            $model4->nutrition_id = $nutrition;
            $model4->save();
        }
        return Menu::where('id', $new_menu->id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_item = Menu::find($id);
        if($existing_item){
            $existing_item->delete();
            return 'Item saccessufuly delete';
        }
        return 'Item not found';
    }

    public function menuCharacters($id)
    {
        /*-$days = [1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота', 7 => 'Воскресенье'];
        $nutritions = [1 => 'Завтрак', 2 => 'Второй завтрак', 3 => 'Обед', 4 => 'Полдник', 5 => 'Ужин', 6 => 'Второй ужин'];
        $menus_days = MenuDays::where('menu_id', $id)->get();
        $menus_nutritions = MenuNutrition::where('menu_id', $id)->get();
        foreach ($menus_days as $m_day){
            $characters['days'][$m_day->days_id] = $days[$m_day->days_id];
        }
        foreach ($menus_nutritions as $m_nutrition){
            $characters['nutritions'][$m_nutrition->nutrition_id] = $nutritions[$m_nutrition->nutrition_id];
        }*/

        return 123;
    }
}
