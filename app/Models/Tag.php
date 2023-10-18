<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $timestamps = false;
    public $translatedAttributes = ['title'];

    public function meals(){
        return $this->belongsToMany(Meal::class, 'meal_tags', 'tag_id', 'meal_id');
    }
}
