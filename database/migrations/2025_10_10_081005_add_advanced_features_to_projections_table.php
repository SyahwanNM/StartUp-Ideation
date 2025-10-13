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
        Schema::table('projections', function (Blueprint $table) {
            // Assets and Depreciation
            $table->json('assets')->nullable()->after('employees');
            
            // Dynamic Growth Rate per Year
            $table->json('yearly_growth_rates')->nullable()->after('annual_growth_rate');
            
            // Products and HPP
            $table->json('products')->nullable()->after('assets');
            
            // Funding Sources
            $table->json('funding_sources')->nullable()->after('products');
            
            // Remove old annual_growth_rate as it will be replaced by yearly_growth_rates
            $table->dropColumn('annual_growth_rate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projections', function (Blueprint $table) {
            $table->dropColumn(['assets', 'yearly_growth_rates', 'products', 'funding_sources']);
            $table->decimal('annual_growth_rate', 5, 2)->after('baseline_revenue');
        });
    }
};