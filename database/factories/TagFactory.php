<?php

namespace Database\Factories;
require_once 'vendor/autoload.php';
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
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
            'slug' => $faker->unique()->numerify('tag-####')
            
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
