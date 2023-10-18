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
        Schema::create('category_translations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->foreignId('category_id')->onDelete('cascade');
            $table->string('locale');

            $table->string('title');

            $table->unique(['category_id','locale']);
            $table->foreign('locale')->references('lang')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_tranlsations');
    }
};
