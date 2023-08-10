<?php

namespace Database\Seeders;

use App\Models\Audio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AudiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Audio::factory(6000)->create();
    }
}
