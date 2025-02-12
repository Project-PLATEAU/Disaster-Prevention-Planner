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
        Schema::create('disaster_risks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->integer('time')->nullable();
            $table->integer('type')->nullable();
            $table->string('file1', 50)->nullable();
            $table->text('detail1')->nullable();
            $table->string('file2', 50)->nullable();
            $table->text('detail2')->nullable();
            $table->string('file3', 50)->nullable();
            $table->text('detail3')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'users_user_id'
            );
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'disaster_riks_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disaster_risks');
    }
};
