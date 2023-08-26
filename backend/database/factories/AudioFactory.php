<?php

namespace Database\Factories;

use App\Models\Audio;
use App\Models\Sentence;
use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audio>
 */
class AudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $file_array = [];
        $directory_path = 'public/assets/files/audios';
        $files = glob($directory_path . '/*');
        foreach ($files as $file) {
            $file_array[] = $file;
        }
        $random = rand(0, 1);
        $sentence_id = null;
        $word_id = null;
        if ($random == 0) {
            $sentence = null;
            $dup_audio = true;
            while ($dup_audio) {
                $sentence = Sentence::all()->random();
                $audios = Audio::all();
                foreach ($audios as $audio) {
                    if ($sentence->id != $audio->sentence_id) {
                        $dup_audio = false;
                        $sentence_id = $sentence->id;
                        break;
                    }
                }
            }
        } elseif ($random == 1) {
            $word = null;
            $dup_audio = true;
            while ($dup_audio) {
                $word = Word::all()->random();
                $audios = Audio::all();
                foreach ($audios as $audio) {
                    if ($word->id != $audio->word_id) {
                        $dup_audio = false;
                        $word_id = $word->id;
                        break;
                    }
                }
            }
        }
        return [
            'sentence_id' => $sentence_id,
            'word_id' => $word_id,
            'audio' => $file_array[array_rand($file_array)],
        ];
    }
}
