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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->foreignId('area_list_id')->constrained(
                table: 'area_lists', indexName: 'supplies_area_lists_id'
            );
            $table->foreignId('warehouse_id')->constrained(
                table: 'warehouses', indexName: 'supplies_warehouses_id'
            );
            $table->foreignId('material_item_master_id')->constrained(
                table: 'material_item_masters', indexName: 'supplies_material_item_masters_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
