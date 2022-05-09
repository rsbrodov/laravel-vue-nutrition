<?php

namespace App\Services;

use App\Models\Dishes;
use App\Models\DishesProducts;
use App\Models\MenuDishes;
use App\Models\Products;

class MenusDishesService
{
    /*РАСЧЕТ белков/жиров/углеводов для отдельного продукта С КОЕФИЦИЕНТАМИ уварки*/
    public function get_products_bju($products_id, $dishes_id, $field){
        if($field == 'protein'){
            $koef = 0.94;
        }
        elseif ($field == 'fat'){
            $koef = 0.88;
        }
        elseif($field == 'carbohydrates_total'){
            $koef = 0.91;
        }
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
            $kkal = $this->get_products_bju($d_product->products_id, $m_dishes->dishes_id, $field) * ($d_product->net_weight/100) *($m_dishes->yield / $dishes->yield);/**/
            $total = $total + $kkal;
        }
        return $total;
    }

    public function CalculateMenuInfo($id){
        return $id;
    }
}
