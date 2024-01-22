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
        // Schema::table('record_detail', function (Blueprint $table) {
        // $table->foreignId('spending_category_id')->after('user_details_id')->constrained('spending_category');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('record_detail', function (Blueprint $table) {
        //     // $table->dropConstrainedForeignId('spending_category_id');
        //     // 外部キー制約を削除
        //     $table->dropForeign(['spending_category_id']);

        //     // カラムを削除
        //     $table->dropColumn('spending_category_id');
        // });
    }
};
