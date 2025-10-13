<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projections', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->decimal('baseline_revenue', 15, 2);
            $table->decimal('annual_growth_rate', 5, 2);
            $table->integer('projection_years');
            $table->json('fixed_costs')->nullable();
            $table->json('variable_costs')->nullable();
            $table->json('employees')->nullable();
            $table->json('projections_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projections');
    }
};
