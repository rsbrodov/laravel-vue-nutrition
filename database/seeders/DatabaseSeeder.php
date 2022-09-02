<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\RecipesCollection::factory(5)->create();
        \App\Models\CulinaryProcessing::factory(3)->create();
        \App\Models\DishesCategory::factory(10)->create();
        \App\Models\ProductsCategory::factory(10)->create();
        \App\Models\ProductsSubcategory::factory(20)->create();
        $dishes = \App\Models\Dishes::factory(10)->create();
        $products = \App\Models\Products::factory(50)->create();
        $nutritions = \App\Models\Nutrition::factory(6)->create();
        $days = \App\Models\Day::factory(7)->create();
        $menus = \App\Models\Menu::factory(10)->create();

        foreach($menus as $menu){
            $nutritions_id = $nutritions->random(1, 3)->pluck('id');
            $days_id = $days->random(1, 3)->pluck('id');
            $menu->nutritions()->attach($nutritions_id);
            $menu->days()->attach($days_id);
        }
        foreach($dishes as $dish){
            $products_id = $products->random(1, 6)->pluck('id');
            $dish->products()->attach($products_id, ['net_weight' => random_int(10, 100), 'gross_weight' => random_int(10, 100)]);
        }

    }
}
