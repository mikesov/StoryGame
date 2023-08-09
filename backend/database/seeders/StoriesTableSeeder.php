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
        Story::factory(110)->create()
//        ->each(function ($story) {
//            ReadHistory::factory(10000)
//                ->create(['user_id' => $story->id]);
//            WriteHistory::factory(200)
//                ->create(['user_id' => $story->id]);
//            UserAchievement::factory(1000)
//                ->create(['user_id' => $story->id]);
//            Page::factory(1000)
//                ->create(['story_id' => $story->id]);
//            StoryGenre::factory(110)
//                ->create(['story_id' => $story->id]);
//            DeleteHistory::factory(10)
//                ->create(['story_id' => $story->id]);
//        })
        ;
    }
}
