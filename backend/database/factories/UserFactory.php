<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function Laravel\Prompts\password;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => $this->faker->dateTime($max = 'now', $timezone = 'Asia/Ho_Chi_Minh'),
            'password' => Hash::make(Str::random(8)), // password
            'coins' => $this->faker->numberBetween(0, 9000),
            'phone' => $this->faker->e164PhoneNumber(),
            'stories_read' => $this->faker->numberBetween(0, 100),
            'admin' => $this->faker->boolean($chanceOfGettingTrue = 1),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
