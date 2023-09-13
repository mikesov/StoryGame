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
        $this->call(PagesTableSeeder::class);
        $this->call(SentencesTableSeeder::class);
        $this->call(WordsTableSeeder::class);
        $this->call(TouchablesTableSeeder::class);
        $this->call(AudiosTableSeeder::class);
        $this->call(MovementsTableSeeder::class);
    }
}
