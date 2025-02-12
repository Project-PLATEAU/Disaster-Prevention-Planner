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
        Schema::create('contact_systems', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->nullable();
            $table->string('role', 50)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'contact_systems_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_systems');
    }
};
