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
        Schema::create('stocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('average_dividend_yield', 30, 18);
            $table->decimal('profit_growth', 30, 18);
            $table->decimal('price_to_earnings_ratio', 30, 18);
            $table->decimal('pbv_times_pe_ratio', 30, 18);
            $table->decimal('net_margin', 30, 18);
            $table->decimal('return_on_equity', 30, 18);
            $table->decimal('net_debt', 30, 18);
            $table->boolean('stock_vs_inflation_last_10_years')->nullable();
            $table->timestamp('analysis_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
