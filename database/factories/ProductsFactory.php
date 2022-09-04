<?php

namespace Database\Factories;

use App\Models\ProductsCategory;
use App\Models\ProductsSubcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'products_categories_id' => ProductsCategory::get()->random()->id,
            'products_subcategories_id' => ProductsSubcategory::get()->random()->id,
            'sort' => random_int(1, 100),
            'water' => random_int(1, 100),
            'protein' => random_int(1, 100),
            'fat' => random_int(1, 100),
            'carbohydrates_total' => random_int(1, 100),
            'na' => random_int(1, 100),
            'k' => random_int(1, 100),
            'ca' => random_int(1, 100),
            'mg' => random_int(1, 100),
            'p' => random_int(1, 100),
            'fe' => random_int(1, 100),
            'i' => random_int(1, 100),
            'se' => random_int(1, 100),
            'vitamin_a' => random_int(1, 100),
            'vitamin_b1' => random_int(1, 100),
            'vitamin_b2' => random_int(1, 100),
            'vitamin_c' => random_int(1, 100),
            'vitamin_d' => random_int(1, 100),
        ];
    }
}
