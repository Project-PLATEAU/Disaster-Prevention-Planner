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
        Schema::create('evacuation_routes', function (Blueprint $table) {
            $table->id();
            $table->string('departure_id', 100);
            $table->string('stopover_id', 100)->nullable();
            $table->string('destination_id', 100);
            $table->mediumText('image')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'evacuation_routes_users_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuation_routes');
    }
};
