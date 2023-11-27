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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name')->nullable();
            $table->string('fund_cluster')->nullable();
            $table->integer('division_id');
            $table->integer('rc_code')->nullable();
            $table->integer('office_id');
            $table->text('purpose');
            
            // Requested by
            $table->integer('requested_by');
            $table->string('requested_signature')->nullable();
            $table->integer('requested_printed_name')->nullable();
            $table->integer('requested_designation')->nullable();
            $table->date('requested_date')->nullable();

            // Approved by
            $table->integer('approved_by')->nullable();
            $table->string('approved_signature')->nullable();
            $table->integer('approved_printed_name')->nullable();
            $table->integer('approved_designation')->nullable();
            $table->date('approved_date')->nullable();

            // Issued by
            $table->integer('issued_by')->nullable();
            $table->string('issued_signature')->nullable();
            $table->integer('issued_printed_name')->nullable();
            $table->integer('issued_designation')->nullable();
            $table->date('issued_date')->nullable();

            // Received by
            $table->integer('received_by')->nullable();
            $table->string('received_signature')->nullable();
            $table->integer('received_printed_name')->nullable();
            $table->integer('received_designation')->nullable();
            $table->date('received_date')->nullable();

            $table->enum('status', ['approved', 'disapproved', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitions');
    }
};