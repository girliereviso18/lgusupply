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
        Schema::create('requisitions_items', function (Blueprint $table) {
            $table->id();
            $table->integer('requisitions_id');
            $table->integer('stock_no')->nullable();
            $table->integer('unit_id');
            $table->integer('item_id');
            $table->integer('qty');
            $table->integer('isavailable');
            $table->integer('issued_qty')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisition_items');
    }
};
