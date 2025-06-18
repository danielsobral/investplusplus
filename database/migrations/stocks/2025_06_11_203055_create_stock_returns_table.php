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
        Schema::create('stock_returns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('stock_id')->constrained('stocks')->cascadeOnDelete();
            $table->string('stock', 50);
            $table->decimal('stock_price', 30, 18);
            $table->decimal('average_dividend_yield', 30, 18);
            $table->integer('stock_quantity')->default(0);
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
        Schema::dropIfExists('stock_returns');
    }
};
