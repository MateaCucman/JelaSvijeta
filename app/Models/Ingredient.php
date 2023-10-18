<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $timestamps = false;
    public $translatedAttributes = ['title'];

    public function meals(){
        return $this->belongsToMany(Meal::class, 'meal_ingredient', 'ingredient_id', 'meal_id');
    }
}
