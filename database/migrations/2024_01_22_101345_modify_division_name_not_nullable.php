<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    // Update existing rows with a valid division_name
    DB::table('divisions')->whereNull('division_name')->update(['division_name' => 'Default']);

    // Modify the column to be not nullable
    Schema::table('divisions', function (Blueprint $table) {
        $table->string('division_name')->nullable(false)->change();
    });
}

    public function down(): void
    {
        Schema::table('divisions', function (Blueprint $table) {
            //
        });
    }
};
