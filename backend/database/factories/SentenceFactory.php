<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Sentence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sentence>
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
        $page = null;
        $dup_sentence = true;
        while ($dup_sentence) {
            $page = Page::all()->random();
            $sentences = Sentence::all();
            foreach ($sentences as $sentence) {
                if ($page->id != $sentence->page_id) {
                    $dup_sentence = false;
                    break;
                }
            }
        }
        return [
            'page_id' => $page->id,
            'coordinateX' => $this->faker->numberBetween(1000, 3000),
            'coordinateY' => $this->faker->numberBetween(300, 1700),
            'content' => $this->faker->sentence(),
        ];
    }
}
