<?php

namespace Database\Factories;
require_once 'vendor/autoload.php';
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Meal;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
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
            'category_id' => $faker->optional()->numberBetween(1,10),
            'ingredient_id' => $faker->numberBetween(1,50),
            'tag_id' => $faker->numberBetween(1,50)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($model) {
            $languages = Language::all();

            foreach ($languages as $language) {
                $model->translations()->create([
                    'locale' => $language->lang,
                    'title' => $this->faker->word(),
                    'description' => $this->faker->paragraph(2)
                ]);
            }
        });
    }
}
