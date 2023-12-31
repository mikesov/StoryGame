<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $file_array = [];
        $directory_path = 'public/assets/files/images';
        $files = glob($directory_path . '/*');
        foreach ($files as $file) {
            $file_array[] = $file;
        }
        return [
            'name' => $this->faker->sentence(),
            'cover' => $file_array[array_rand($file_array)],
            'reward' => $this->faker->numberBetween(5, 20),
        ];
    }
}
