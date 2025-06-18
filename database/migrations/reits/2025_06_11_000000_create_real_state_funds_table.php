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
        Schema::create('real_state_funds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['brick_reit', 'paper_reit', 'mixed_reit']);
            $table->decimal('twelve_month_dividend_yield', 30, 18);
            $table->decimal('price_to_book_ratio', 30, 18);
            $table->string('liquidity', 50);
            $table->boolean('reits_vs_inflation');
            $table->decimal('management_fee', 30, 18);
            $table->decimal('vacancy_rate', 30, 18)->nullable();
            $table->string('book_value', 50);
            $table->integer('reit_age');
            $table->decimal('leverage', 30, 18);
            $table->timestamp('analysis_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_state_funds');
    }
};
