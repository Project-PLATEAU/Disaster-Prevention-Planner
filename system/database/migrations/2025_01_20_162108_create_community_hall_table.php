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
        Schema::create('community_halls', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('detail', 100)->nullable();
            $table->string('bldg_id', 100)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'community_halls_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_halls');
    }
};
