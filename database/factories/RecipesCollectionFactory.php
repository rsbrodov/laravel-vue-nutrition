<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipesCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(10),
            'short_title' => $this->faker->sentence(5),
            'organization_id' => random_int(1, 4),
            'year' => random_int(1, 4),
        ];
    }
}
