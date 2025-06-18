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
        Schema::create('reit_returns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('reit_id')->constrained('real_state_funds')->cascadeOnDelete();
            $table->enum('reit_type', ['brick_reit', 'paper_reit', 'mixed_reit']);
            $table->string('reit', 50);
            $table->decimal('reit_price', 30, 18);
            $table->decimal('monthly_dividend_yield', 30, 18);
            $table->integer('reit_quantity')->default(0);
            $table->decimal('annual_income', 30, 18);
            $table->decimal('monthly_income', 30, 18);
            $table->decimal('invested_amount', 30, 18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reit_returns');
    }
};
