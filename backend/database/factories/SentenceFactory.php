<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sentence>
 */
class SentenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => 10,
            'coordinateX' => 1900,
            'coordinateY' => 300,
            'content' => 'It\'s fun to make something together. Now let\'s enjoy',
        ];
    }
}
