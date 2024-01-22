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
        Schema::create('record_detail', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('amount');
            $table->string('memo',60); //のちにnullableを修正設定
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_detail');
    }
};
