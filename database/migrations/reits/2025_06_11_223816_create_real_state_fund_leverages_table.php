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
        Schema::create('real_state_fund_leverages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('reit_id')->constrained('real_state_funds')->cascadeOnDelete();
            $table->decimal('asset_value', 30, 18)->nullable();
            $table->decimal('liabilities_for_property_acquisition', 30, 18)->nullable();
            $table->decimal('advance_from_property_sale', 30, 18)->nullable();
            $table->decimal('advance_rental_income', 30, 18)->nullable();
            $table->decimal('liabilities_from_receivables_securitization', 30, 18)->nullable();
            $table->decimal('derivative_financial_instruments', 30, 18)->nullable();
            $table->decimal('provisions_for_contingencies', 30, 18)->nullable();
            $table->decimal('other_payables', 30, 18)->nullable();
            $table->decimal('leverage', 30, 18)->nullable();
            $table->timestamp('analysis_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_state_fund_leverages');
    }
};
