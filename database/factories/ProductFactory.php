<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(1, true),
            'description' => $this->faker->sentence(),
            'image_url' => $this->faker->imageUrl(),
            'price' => rand(10000, 15000),
            'is_active' => $this->faker->boolean(80)
        ];
    }
}
