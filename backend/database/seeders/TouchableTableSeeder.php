<?php

namespace Database\Seeders;

use App\Models\Audio;
use App\Models\BlinkObject;
use App\Models\Movement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TouchableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlinkObject::factory(5000)->create()
        ->each(function ($blinkObject) {
            Audio::factory(5000)->create(['object_id' => $blinkObject->id]);
            Movement::factory(1000)->create(['object_id' => $blinkObject->id]);
        });
    }
}
