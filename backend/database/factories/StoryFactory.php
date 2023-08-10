<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
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
        $directory_path = '/path/to/directory';
        $files = glob($directory_path . '/*');
        foreach ($files as $file) {
            $file_array[] = $file;
        }
        return [
            'name' => 'Let\'s make a some salad!',
            'cover' => $file_array[array_rand($file_array)],
            'pages' => 10,
            'reward' => $this->faker->numberBetween(0, 20),
        ];
    }
}
