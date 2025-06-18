<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('retirements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('accumulated_wealth', 30, 18)->nullable();
            $table->decimal('monthly_investment', 30, 18)->nullable();
            $table->decimal('average_annual_return', 30, 18)->nullable();
            $table->string('time_period', 50);
            $table->decimal('annual_contribution', 30, 18)->nullable();
            $table->decimal('return', 30, 18)->nullable();
            $table->decimal('total_value', 30, 18)->nullable();
            $table->decimal('income_per_year', 30, 18)->nullable();
            $table->decimal('income_per_month', 30, 18)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirements');
    }
};
