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
        Schema::create('carry_type_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('view')->default(1);
            $table->timestamps();
        });

        Schema::create('carry_item_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('view')->default(1);
            $table->timestamps();
            $table->foreignId('carry_type_master_id')->constrained(
                table: 'carry_type_masters', indexName: 'carry_item_masters_carry_type_masters_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carry_item');
    }
};
