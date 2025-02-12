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
        Schema::create('area_images', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->mediumText('image01')->nullable();
            $table->mediumText('image02')->nullable();
            $table->mediumText('image03')->nullable();
            $table->mediumText('image04')->nullable();
            $table->mediumText('image05')->nullable();
            $table->mediumText('image06')->nullable();
            $table->mediumText('image07')->nullable();
            $table->timestamps();
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'area_images_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_images');
    }
};
