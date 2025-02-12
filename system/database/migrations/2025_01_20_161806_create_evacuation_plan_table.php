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
        Schema::create('evacuation_plans', function (Blueprint $table) {
            $table->id();
            $table->string('filename', 100);
            $table->timestamps();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'evacuation_plans_users_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuation_plans');
    }
};
