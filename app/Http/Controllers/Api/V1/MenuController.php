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
        $menus = Menu::with('nutritions', 'days')->get();
        return $menus;
    }

    public function firstMenu()
    {
        $menus = Menu::first();
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
        $mas_days_info = ['days1' => 1, 'days2' => 2, 'days3' => 3, 'days4' => 4, 'days5' => 5, 'days6' => 6, 'days7' => 7];
        $mas_nutritions_info = ['nutrition1' => 1, 'nutrition2' => 2, 'nutrition3' => 3, 'nutrition4' => 4, 'nutrition5' => 5, 'nutrition6' => 6];

        //$new_menu->days->attach(1);
        //return $new_menu;
        foreach($mas_days_info as $key => $mdi){
            if($request->form[$key] == true){
                $mas_days[] = $mdi;
            }
        }

        foreach($mas_nutritions_info as $key => $mni){
            if($request->form[$key] == true){
                $mas_nutritions[] = $mni;
            }
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
        return Menu::find($new_menu->id);
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
