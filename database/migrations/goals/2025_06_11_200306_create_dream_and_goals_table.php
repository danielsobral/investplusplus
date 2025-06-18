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
        Schema::create('dream_and_goals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('dream_name', 50);
            $table->string('dream_avatar_path_url');
            $table->decimal('accumulated_wealth', 30, 18);
            $table->decimal('monthly_investment', 30, 18);
            $table->decimal('average_annual_return', 30, 18);
            $table->string('time_period', 50);
            $table->decimal('annual_contribution', 30, 18);
            $table->decimal('return', 30, 18);
            $table->decimal('total_value', 30, 18);
            $table->decimal('income_per_year', 30, 18);
            $table->decimal('income_per_month', 30, 18);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dream_and_goals');
    }
};
