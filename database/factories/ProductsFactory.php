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
        ];
    }
}
