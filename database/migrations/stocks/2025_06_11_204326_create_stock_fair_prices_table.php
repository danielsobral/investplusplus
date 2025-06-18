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
        Schema::create('stock_fair_prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('stock_id')->constrained('stocks')->cascadeOnDelete();
            $table->decimal('graham', 30, 18)->default(0.225);
            $table->decimal('earnings_per_share', 30, 18);
            $table->decimal('book_value_per_share', 30, 18);
            $table->decimal('risk_premium', 30, 18)->default(0.3);
            $table->decimal('fair_price', 30, 18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_fair_prices');
    }
};
