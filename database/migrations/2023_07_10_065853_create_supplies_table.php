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
            $table->string('stock_number')->nullable();
            $table->integer('item_id');
            $table->integer('qty');
            $table->string('unit_of_measurement');
            $table->integer('supplier_id');
            $table->integer('price_per_unit');
            $table->date('date_of_purchase')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('status')->nullable();
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
