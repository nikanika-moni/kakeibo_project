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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('net_income');
            $table->integer('rent');
            $table->integer('entertainment_expenses');
            $table->integer('transportation_expenses');
            $table->integer('food_expenses');
            $table->integer('entertainment');
            $table->integer('savings_so_far');
            $table->integer('average_savings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
