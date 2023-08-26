<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Page;
use App\Models\Touchable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $file_array = [];
        $directory_path = 'public/assets/files/images';
        $files = glob($directory_path . '/*');
        foreach ($files as $file) {
            $file_array[] = $file;
        }
        $random = rand(0, 1);
        $page_id = null;
        $touchable_id = null;
        if ($random == 0) {
            $page = null;
            $dup_image = true;
            while ($dup_image) {
                $page = Page::all()->random();
                $images = Image::all();
                foreach ($images as $image) {
                    if ($page->id != $image->page_id) {
                        $dup_image = false;
                        $page_id = $page->id;
                        break;
                    }
                }
            }
        } elseif ($random == 1) {
            $touchable = null;
            $dup_image = true;
            while ($dup_image) {
                $touchable = Touchable::all()->random();
                $images = Image::all();
                foreach ($images as $image) {
                    if ($touchable->id != $image->touchable_id) {
                        $dup_image = false;
                        $touchable_id = $touchable->id;
                        break;
                    }
                }
            }
        }
        return [
            'page_id' => $page_id,
            'touchable_id' => $touchable_id,
            'image' => $file_array[array_rand($file_array)],
        ];
    }
}
