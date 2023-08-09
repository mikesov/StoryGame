<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StoriesTableSeeder::class);
        $this->call(ReadHistoriesTableSeeder::class);
        $this->call(WriteHistoriesTableSeeder::class);
        $this->call(AchievementsTableSeeder::class);
        $this->call(UserAchievementsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(StoryGenresTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SentencesTableSeeder::class);
        $this->call(WordsTableSeeder::class);
        $this->call(BlinkImagesTableSeeder::class);
        $this->call(TouchableTableSeeder::class);
        $this->call(AudioTableSeeder::class);
        $this->call(BackgroundImagesSeeder::class);
        $this->call(MovementsTableSeeder::class);
        $this->call(DeleteHistoriesTableSeeder::class);
        $this->call(AchievementCRUDHistoriesTableSeeder::class);
    }
}
