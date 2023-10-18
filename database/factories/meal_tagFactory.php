<?php

namespace Database\Factories;
require_once 'vendor/autoload.php';
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\meal_tag>
 */
class meal_tagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'meal_id' => $faker->numberBetween(1,30),
            'tag_id' => $faker->numberBetween(1,50)
        ];
    }
}
