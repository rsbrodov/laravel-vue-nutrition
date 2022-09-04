<?php

namespace App\Services;

use App\Http\Traits\Menus;
use App\Models\Dishes;
use App\Models\MenuDishes;
use App\Models\Products;
use Illuminate\Http\Request;

class DishesService
{
    public function copy($id){
        $dish = Dishes::find($id);
        $new_dish = $dish->replicate();
        $new_dish->name = $dish->name.'(копия)';
        $new_dish->push();
        foreach($dish->products as $product)
        {
            $new_dish->products()->attach($product, ['net_weight' => random_int(10, 100), 'gross_weight' => random_int(10, 100)]);
        }
        return $new_dish;
    }

    public function techmap_menu_dishes($menus_dishes_id){
        $menus_dish = MenuDishes::find($menus_dishes_id);
        $dish = Dishes::find($menus_dish->dishes_id)->with('products', 'recipes_collections')->get();
        $result = [];
        foreach($dish->products as $d_product){
            $result['products'][$d_product->id]['name'] = Products::find($d_product->products_id)->name;
            $result['products'][$d_product->id]['gross'] = $d_product->gross_weight;
            $result['products'][$d_product->id]['nett'] = $d_product->nett_weight;
            $result['products'][$d_product->id]['protein'] = MenusDishesService::get_products_bju($d_product->products_id, $dish->id, 'protein') * ($d_product->net_weight)/100;
            $result['products'][$d_product->id]['fat'] = MenusDishesService::get_products_bju($d_product->products_id, $dish->id, 'fat') * ($d_product->net_weight)/100;
            $result['products'][$d_product->id]['carbohydrates_total'] = MenusDishesService::get_products_bju($d_product->products_id, $dish->id, 'carbohydrates_total') * ($d_product->net_weight)/100;
            $result['products'][$d_product->id]['kkal'] = MenusDishesService::get_kkal($d_product->products_id, $menus_dishes_id) * ($d_product->net_weight)/100;

        }
        $result['dish']['characters'] = $dish->description;
        $result['dish']['yield'] = $dish->yield;
        $result['dish']['dishes_characters'] = $dish->dishes_characters;
        $result['dish']['recipes_collections'] = $dish->recipes_collections->name;
        return $result;
    }
}
