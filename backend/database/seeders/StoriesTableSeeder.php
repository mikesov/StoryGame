<?php

namespace Database\Seeders;

use App\Models\DeleteHistory;
use App\Models\Page;
use App\Models\Story;
use App\Models\StoryGenre;
use App\Models\WriteHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Story::factory(1)->create();
    }
}
