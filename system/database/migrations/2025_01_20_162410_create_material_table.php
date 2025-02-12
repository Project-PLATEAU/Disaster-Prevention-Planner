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
        Schema::create('material_type_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('view')->default(1);
            $table->timestamps();
        });

        Schema::create('material_item_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('view')->default(1);
            $table->timestamps();
            $table->foreignId('material_type_master_id')->constrained(
                table: 'material_type_masters', indexName: 'material_item_masters_material_type_masters_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
