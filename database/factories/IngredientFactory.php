<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
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
            //'title' => $faker->word(),
            'slug' => $faker->unique()->numerify('ingredient-####')
            //'ingredients_id' => $faker->unique()->numberBetween(1,50)

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($model) {
            $languages = Language::all();

            foreach ($languages as $language) {
                $model->translations()->create([
                    'locale' => $language->lang,
                    'title' => $this->faker->word()
                ]);
            }
        });
    }
}
