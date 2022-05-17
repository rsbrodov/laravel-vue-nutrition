<?php

namespace App\Services;

use App\Http\Traits\Menus;
use App\Models\Day;
use App\Models\Dishes;
use App\Models\DishesProducts;
use App\Models\Menu;
use App\Models\MenuDishes;
use App\Models\MenuNutrition;
use App\Models\Nutrition;
use App\Models\Products;

class MenusDishesService
{
    use Menus;

    //Calculate protein/fat/carbo for product
    public function get_products_bju($products_id, $dishes_id, $field){
        $koef = $this->getKoefBJU()[$field];
        $culinary_processing = Dishes::where('id', $dishes_id)->first()->culinary_processing_id;
        if($culinary_processing != 3){
            $products = Products::where('id', $products_id)->first()->$field * $koef;
        }
        else{
            $products = Products::where('id', $products_id)->first()->$field;
        }

        return $products;
    }

    /*функция для расчета белков/жиров/углеводов для всего блюда с учетом уварки его продуктов*/
    public function get_bju_dish($menus_dishes_id, $field){
        $m_dishes = MenuDishes::where('id', $menus_dishes_id)->first();
        $dishes = Dishes::where('id', $m_dishes->dishes_id)->first();
        $total = 0;
        $dishes_products = DishesProducts::where('dishes_id', $m_dishes->dishes_id)->get();
        foreach($dishes_products as $d_product){
            $value = $this->get_products_bju($d_product->products_id, $m_dishes->dishes_id, $field) * ($d_product->net_weight/100) *($m_dishes->yield / $dishes->yield);/**/
            $total = $total + $value;
        }
        return round($total, 1);
    }

    public function get_kkal($products_id, $menus_dishes_id){
        $m_dishes = MenuDishes::where('id', $menus_dishes_id)->first();
        $dishes = Dishes::where('id', $m_dishes->dishes_id)->first();//culinary_processing_id;
        $product = Products::where('id', $products_id)->first();
        if($dishes->culinary_processing_id != 3){
            $kkal = ($product->protein * 4 * 0.94) + ($product->fat * 9 * 0.88) + ($product->carbohydrates_total * 4 * 0.91);
        }
        else{
            $kkal = ($product->protein * 4) + ($product->fat * 9) + ($product->carbohydrates_total * 4);
        }
        return round($kkal, 1);
    }

    public function get_kkal_dish($menus_dishes_id){//за блюдо
        $m_dishes = MenuDishes::where('id', $menus_dishes_id)->first();
        $dishes = Dishes::where('id', $m_dishes->dishes_id)->first();
        $total = 0;
        $dishes_products = DishesProducts::where('dishes_id', $m_dishes->dishes_id)->get();
        foreach($dishes_products as $d_product){
            $kkal = $this->get_kkal($d_product->products_id, $m_dishes->id) * ($d_product->net_weight/100) *($m_dishes->yield / $dishes->yield);/**/
            $total = $total + $kkal;
        }
        return round($total, 1);
    }

    public function CalculateMenuInfo($id){
        $result = [];
        $menu = Menu::where('id', $id)->with('nutritions', 'days')->first();
        //return response()->json($menu->days);
        foreach ($menu->days as $m_day){
            //$result[$m_day->id]['day'] = $m_day->id;
            foreach($menu->nutritions as $m_nutrition){
                $result[$m_day->id][$m_nutrition->id]['nutrition'] = $m_nutrition->id;
                $menu_dishes = MenuDishes::where('menu_id', $menu->id)->where('days_id', $m_day->id)->where('nutrition_id', $m_nutrition->id)->get();
                foreach ($menu_dishes as $m_dish){
                    $dishes = Dishes::where('id', $m_dish->dishes_id)->first();
                    $result[$m_dish->days_id]['day_name'] = Day::where('id', $m_dish->days_id)->first()->name;
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['nutrition_name'] = Nutrition::where('id', $m_dish->nutrition_id)->first()->name;
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['name'] = $dishes->name;
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['techmap_number'] = $dishes->techmap_number;
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['yield'] = $m_dish->yield;
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['protein'] = $this->get_bju_dish($m_dish->id, 'protein');
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['fat'] = $this->get_bju_dish($m_dish->id, 'fat');
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['carbohydrates_total'] = $this->get_bju_dish($m_dish->id, 'carbohydrates_total');
                    $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id]['kkal'] = $this->get_kkal_dish($m_dish->id);
                    foreach($this->getVitaminList() as $vitamin){
                        $result[$m_dish->days_id]['nutrition'][$m_dish->nutrition_id]['dish'][$m_dish->id][$vitamin] = $this->get_vitamin($m_dish->id, $m_dish->yield, $vitamin);

                    }
                }
            }
        }
        return response()->json($result);
    }

    //calculate vitamins for dish.
    public function get_vitamin($menus_dishes_id, $yield, $field){
        $m_dishes = MenuDishes::where('id', $menus_dishes_id)->first();
        $dishes = Dishes::where('id', $m_dishes->dishes_id)->first();
        $dishes_products = DishesProducts::where('dishes_id', $m_dishes->dishes_id)->get();
        $sum = 0;
        if ($dishes->culinary_processing_id != 3){
            $uvarka = $this->getUvarka()[$field];
        }else{
            $uvarka = 1;
        }

        foreach($dishes_products as $d_product){
            $product = Products::where('id', $d_product->products_id)->first();
            $protein = ($product->$field * $d_product->net_weight)/100;
            $sum = $sum + $protein;
        }
        if($dishes->yield > 0){
            $sum = $sum*($yield/$dishes->yield) * $uvarka;
        }else{
            $sum = 0;
        }

        return round($sum, 2);
    }
}
