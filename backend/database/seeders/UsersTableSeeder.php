<?php

namespace Database\Seeders;

use App\Models\AchievementCRUDHistory;
use App\Models\DeleteHistory;
use App\Models\ReadHistory;
use App\Models\User;
use App\Models\UserAchievement;
use App\Models\WriteHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1000)->create();
    }
}
