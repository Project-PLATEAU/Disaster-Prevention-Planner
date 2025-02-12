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
        Schema::create('disaster_prevention_plans', function (Blueprint $table) {
            $table->id();
            $table->string('filename', 100)->nullable();
            $table->timestamps();
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'disaster_prevention_plans_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disaster_prevention_plans');
    }
};
