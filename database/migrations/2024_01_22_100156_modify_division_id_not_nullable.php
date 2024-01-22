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
    DB::table('requisitions')->whereNull('division_id')->update(['division_id' => 1]);

    // Modify the column to be not nullable
    Schema::table('requisitions', function (Blueprint $table) {
        $table->integer('division_id')->nullable(false)->change();
    });
}

    public function down(): void
    {
        Schema::table('requisitions', function (Blueprint $table) {
            if (Schema::hasColumn('requisitions', 'division_id')) {
                $table->integer('division_id')->nullable()->change();
            }
        });
    }
};