<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            IngredientSeeder::class, 
            TagSeeder::class, 
            CategorySeeder::class, 
            MealSeeder::class, 
            MealTagSeeder::class, 
            MealIngredientSeeder::class]);
    }
}
