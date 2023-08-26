<?php

namespace Database\Factories;

use App\Models\Touchable;
use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Touchable>
 */
class TouchableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $word = null;
        $dup_touchable = true;
        while ($dup_touchable) {
            $word = Word::all()->random();
            $touchables = Touchable::all();
            foreach ($touchables as $touchable) {
                if ($word->id != $touchable->word_id) {
                    $dup_touchable = false;
                    break;
                }
            }
        }
        $vertices = [
            "coordX" => $this->faker->numberBetween(300, 3700),
            "coordY" => $this->faker->numberBetween(500, 2000)
        ];
        $verticesJson = json_encode($vertices);
        return [
            'word_id' => $word->id,
            'coordinateX' => $this->faker->numberBetween(0, 4000),
            'coordinateY' => $this->faker->numberBetween(0, 2500),
            'vertices' => $verticesJson,
        ];
    }
}
