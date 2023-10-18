<?php

namespace Database\Factories;
require_once 'vendor/autoload.php';
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'slug' => $faker->unique()->numerify('category-####'),
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
