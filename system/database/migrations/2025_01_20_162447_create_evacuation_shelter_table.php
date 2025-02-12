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
        Schema::create('evacuation_shelters', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable();
            $table->integer('disaster_type')->nullable();
            $table->string('name', 100)->nullable();
            $table->text('recital')->nullable();
            $table->string('bldg_id', 100)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'evacuation_shelters_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuation_shelters');
    }
};
