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
        Schema::table('spending_label_intermediate', function (Blueprint $table) {
            $table->foreignId('user_details_id')->constrained('user_details', 'users_id');
            $table->foreignId('spending_category_id')->constrained('spending_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spending_label_intermediate', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_details_id');
            $table->dropConstrainedForeignId('spending_category_id');
        });
    }
};
