<?php

namespace Database\Seeders;

use App\Models\Word;
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
        Sentence::factory(1)->create();
    }
}
