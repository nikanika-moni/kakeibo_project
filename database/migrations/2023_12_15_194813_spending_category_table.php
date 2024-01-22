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
        Schema::create('spending_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('tag_num');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spending_category');
    }
};

// 12/19に"spending_category"を"spending_categories"にテーブル名を変更
