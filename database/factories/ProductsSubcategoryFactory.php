<?php

namespace Database\Factories;

use App\Models\ProductsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsSubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'products_categories_id' => ProductsCategory::get()->random()->id,
        ];
    }
}
