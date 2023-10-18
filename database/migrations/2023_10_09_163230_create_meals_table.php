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
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->foreignId('category_id')->onDelete('cascade')->nullable();
            $table->foreignId('ingredient_id')->onDelete('cascade');
            $table->foreignId('tag_id')->onDelete('cascade');
            
            $table->string('status')->default('created');
            $table->softDeletes();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
