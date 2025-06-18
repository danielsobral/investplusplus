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
        Schema::create('celling_price_for_stock_and_reits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['stock', 'reit']);
            $table->foreignUuid('stock_id')->nullable()->constrained('stocks')->cascadeOnDelete();
            $table->foreignUuid('reit_id')->nullable()->constrained('real_state_funds')->cascadeOnDelete();
            $table->decimal('average_last_five_years_dividend', 30, 18);
            $table->decimal('target_yield', 30, 18);
            $table->decimal('desired_return', 30, 18);
            $table->decimal('price_ceiling', 30, 18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celling_price_for_stock_and_reits');
    }
};
