<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = ['title', 'description'];
    
    public function categories(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'meal_tags', 'meal_id', 'tag_id');
    }

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'meal_ingredients', 'meal_id', 'ingredient_id');
    }
}