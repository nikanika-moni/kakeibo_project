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
        Schema::table('record_detail', function (Blueprint $table) {
            // $table->foreignId('user_details_id')->after('spending_category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('record_detail', function (Blueprint $table) {
        //     $table->dropConstrainedForeignId('user_details_id');
        // });
    }
};
