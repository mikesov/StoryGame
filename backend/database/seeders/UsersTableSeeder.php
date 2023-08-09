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
        User::factory(1000)->create()
//            ->each(function ($user) {
//            ReadHistory::factory(10000)
//                ->create(['user_id' => $user->id]);
//            WriteHistory::factory(210)
//                ->create(['user_id' => $user->id]);
//            UserAchievement::factory(1000)
//                ->create(['user_id' => $user->id]);
//            DeleteHistory::factory(10)
//                ->create(['user_id' => $user->id]);
//            AchievementCRUDHistory::factory(10)
//                ->create(['user_id' => $user->id]);
//        })
        ;
    }
}
