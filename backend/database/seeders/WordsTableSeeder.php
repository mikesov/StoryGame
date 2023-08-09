<?php

namespace Database\Seeders;

use App\Models\BlinkObject;
use App\Models\BlinkWord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlinkWord::factory(5000)->create()
        ->each(function ($blinkWord) {
            BlinkObject::factory(5000)
                ->create(['word_id' => $blinkWord->id]);
        });
    }
}
