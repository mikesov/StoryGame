<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $story = Story::all()->random();

        $page_number = null;
        $dup_page = true;
        while ($dup_page){
            $page_number = $this->faker->numberBetween(1, 20);
            $pages = Page::where('story_id', $story->id)->get();
            foreach ($pages as $page) {
                if ($page_number != $page->page_number) {
                    $dup_page = false;
                    break;
                }
            }
        }
        return [
            'story_id' => $story->id,
            'page_number' => $page_number,
        ];
    }
}
