<?php

namespace Database\Seeders;

use App\Models\Audio;
use App\Models\BackgroundImage;
use App\Models\Page;
use App\Models\Sentence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory(1000)->create()
        ->each(function ($page) {
            Sentence::factory(1000)->create(['page_id' => $page->id])->unique();
            Audio::factory(1000)->create(['page_id' => $page->id])->unique();
            BackgroundImage::factory(1000)->create(['page_id' => $page->id])->unique();
        });
    }
}
