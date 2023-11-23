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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('description');
            $table->string('stock_no');
            $table->date('date');
            $table->string('reference');
            $table->integer('receipt_qty');
            $table->integer('issuance_qty');
            $table->string('office');
            $table->integer('balance');
            $table->integer('days_to_consume')->nullable();
            $table->timestamps();

          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
