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
        Schema::create('evacuation_timings', function (Blueprint $table) {
            $table->id();
            $table->integer('timing1');
            $table->text('timing1_other')->nullable();
            $table->integer('timing2');
            $table->text('timing2_other')->nullable();
            $table->integer('timing3');
            $table->text('timing3_other')->nullable();
            $table->integer('timing4');
            $table->text('timing4_other')->nullable();
            $table->integer('timing5');
            $table->text('timing5_other')->nullable();
            $table->integer('timing6');
            $table->text('timing6_other')->nullable();
            $table->integer('timing7');
            $table->text('timing7_other')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'evacuation_timings_users_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuation_timings');
    }
};
