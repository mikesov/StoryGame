<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Touchable>
 */
class TouchableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coordinateX' => $this->faker->numberBetween(0, 4000),
            'coordinateY' => $this->faker->numberBetween(0, 2500),
            'dynamic' => $this->faker->boolean,
        ];
    }
}
