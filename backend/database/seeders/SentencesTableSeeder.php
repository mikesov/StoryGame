<?php

namespace Database\Seeders;

use App\Models\BlinkWord;
use App\Models\Sentence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SentencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sentence::factory(1000)->create()
        ->each(function ($sentence) {
            BlinkWord::factory(10000)->create(['sentence_id' => $sentence->id]);
        });
    }
}
