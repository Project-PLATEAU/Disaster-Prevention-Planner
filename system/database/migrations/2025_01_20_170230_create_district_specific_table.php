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
        Schema::create('district_specifics', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('file1', 100)->nullable();
            $table->text('detail1')->nullable();
            $table->string('file2', 100)->nullable();
            $table->text('detail2')->nullable();
            $table->string('file3', 100)->nullable();
            $table->text('detail3')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'district_specifics_area_lists_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_specifics');
    }
};
