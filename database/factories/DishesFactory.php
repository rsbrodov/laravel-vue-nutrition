<?php

namespace Database\Factories;

use App\Models\CulinaryProcessing;
use App\Models\DishesCategory;
use App\Models\RecipesCollection;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishesFactory extends Factory
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
            'dishes_categories_id' => DishesCategory::get()->random()->id,
            'recipes_collections_id' => RecipesCollection::get()->random()->id,
            'description' => $this->faker->text(100),
            'culinary_processings_id' => CulinaryProcessing::get()->random()->id,
            'yield' => random_int(10,500),
            'dishes_characters' => $this->faker->text(50),
            'techmap_number' => random_int(10,50),
        ];
    }
}
