<?php

namespace Database\Factories;

use App\Models\Movement;
use App\Models\Touchable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $touchable = null;
        $dup_movement = true;
        while ($dup_movement) {
            $touchable = Touchable::all()->random();
            $movements = Movement::all();
            foreach ($movements as $movement) {
                if ($touchable->id != $movement->touchable_id) {
                    $dup_movement = false;
                    break;
                }
            }
        }
        return [
            'touchable_id' => $touchable->id,
            'moveX' => $this->faker->numberBetween(500, 3500),
            'moveY' => $this->faker->numberBetween(500, 2000),
        ];
    }
}
