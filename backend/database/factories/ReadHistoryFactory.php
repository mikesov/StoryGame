<?php

namespace Database\Factories;

use App\Models\ReadHistory;
use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadHistory>
 */
class ReadHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dup_user = true;
        $dup_story = true;
        $user = null;
        $story = null;
        while ($dup_user || $dup_story) {
            $read_histories = ReadHistory::all();
            if ($dup_user) {
                $user = User::all()->random();
                foreach ($read_histories as $read_history) {
                    $dup_user = !($user->id != $read_history->user_id);
                    if (!$dup_user) {
                        break;
                    }
                }
            }
            if ($dup_story) {
                $story = Story::all()->random();
                foreach ($read_histories as $read_history) {
                    $dup_story = !($story->id != $read_history->story_id);
                    if (!$dup_story) {
                        break;
                    }
                }
            }
        }

        return [
            'user_id' => $user->id,
            'story_id' => $story->id,
            'finish' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime('now', 'Asia/Ho_Chi_Minh'),
        ];
    }
}
