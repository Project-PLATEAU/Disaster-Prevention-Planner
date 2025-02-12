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
        Schema::create('bldg_risks', function (Blueprint $table) {
            $table->id();
            $table->string('bldg_id', 100);
            $table->string('river_flood_name', 200)->nullable();
            $table->string('river_flood_rank', 50)->nullable();
            $table->string('river_flood_depth', 50)->nullable();
            $table->string('river_flood_duration', 50)->nullable();
            $table->text('river_flood_detail')->nullable();
            $table->string('tsunami_rank', 50)->nullable();
            $table->string('tsunami_depth', 50)->nullable();
            $table->string('tsunami_detail', 200)->nullable();
            $table->string('hightide_rank', 50)->nullable();
            $table->string('hightide_depth', 50)->nullable();
            $table->string('hightide_detail', 200)->nullable();
            $table->string('inland_flood_rank', 50)->nullable();
            $table->string('inland_flood_depth', 50)->nullable();
            $table->string('inland_flood_detail', 200)->nullable();
            $table->string('reservoir_flood_rank', 50)->nullable();
            $table->string('reservoir_flood_depth', 50)->nullable();
            $table->string('reservoir_flood_detail', 200)->nullable();
            $table->string('landslide_type', 50)->nullable();
            $table->string('landslide_class', 50)->nullable();
            $table->string('landslide_detail', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bldg_risk');
    }
};
