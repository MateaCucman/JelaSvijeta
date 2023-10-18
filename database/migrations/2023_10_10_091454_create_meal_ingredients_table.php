<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_ingredients', function (Blueprint $table) {
            $table->foreignId('meal_id')->unsigned()->onDelete('cascade');
            $table->foreignId('ingredient_id')->unsigned()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_ingredients');
    }
};
