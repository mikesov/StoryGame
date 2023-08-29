<?php

namespace Database\Factories;

use App\Models\Sentence;
use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Word>
 */
class WordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sentence = Sentence::all()->random();
        $max_words = true;
        while ($max_words) {
            $wordCount = Sentence::where('sentence_id', $sentence->id)->count();
            if ($wordCount < 6) {
                $max_words = false;
            } else {
                $sentence = Sentence::all()->random();
            }
        }
        $order = null;
        $dup_word = true;
        while ($dup_word){
            $order = $this->faker->numberBetween(1, 6);
            $words = Word::where('sentence_id', $sentence->id)->get();
            foreach ($words as $word) {
                if ($order != $word->page_number) {
                    $dup_word = false;
                    break;
                }
            }
        }
        return [
            'sentence_id' => $sentence->id,
            'content' => $this->faker->word(),
            'order' => $order,
        ];
    }
}
