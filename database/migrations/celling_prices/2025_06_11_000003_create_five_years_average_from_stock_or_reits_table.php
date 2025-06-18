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
        Schema::create('five_years_average_from_stock_or_reits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('celling_price_id')->constrained('celling_price_for_stock_and_reits')->cascadeOnDelete();
            $table->decimal('first_year', 30, 18);
            $table->decimal('second_year', 30, 18);
            $table->decimal('third_year', 30, 18);
            $table->decimal('fourth_year', 30, 18);
            $table->decimal('fifth_year', 30, 18);
            $table->decimal('average', 30, 18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('five_years_average_from_stock_or_reits');
    }
};
