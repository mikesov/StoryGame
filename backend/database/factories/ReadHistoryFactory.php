<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadHistory>
 */
class ReadHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'finish' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime('now', 'Asia/Ho_Chi_Minh'),
        ];
    }
}
