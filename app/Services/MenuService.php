<?php

namespace App\Services;

use App\Http\Traits\Menus;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    use Menus;

    public function store($request){
        $new_menu = Menu::create([
            'name' => $request['name'],
            'parent_id' => 0,
        ]);
        $mas_days_info = ['days1' => 1, 'days2' => 2, 'days3' => 3, 'days4' => 4, 'days5' => 5, 'days6' => 6, 'days7' => 7];
        $mas_nutritions_info = ['nutrition1' => 1, 'nutrition2' => 2, 'nutrition3' => 3, 'nutrition4' => 4, 'nutrition5' => 5, 'nutrition6' => 6];

        foreach($mas_days_info as $key => $mdi){
            if($request[$key] == true){
                $mas_days[] = $mdi;
            }
        }

        foreach($mas_nutritions_info as $key => $mni){
            if($request[$key] == true){
                $mas_nutritions[] = $mni;
            }
        }

        $new_menu->nutritions()->attach($mas_nutritions);
        $new_menu->days()->attach($mas_days);
        return $new_menu;
    }
}
