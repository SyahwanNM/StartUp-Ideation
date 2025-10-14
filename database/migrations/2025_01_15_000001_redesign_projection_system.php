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
        // First, create projections table if it doesn't exist
        if (!Schema::hasTable('projections')) {
            Schema::create('projections', function (Blueprint $table) {
                $table->id();
                $table->string('business_name');
                $table->integer('baseline_units_sold'); // Total units sold in first month
                $table->json('product_distribution')->nullable(); // Distribution percentages
                $table->integer('projection_years');
                $table->json('fixed_costs')->nullable();
                $table->json('variable_costs')->nullable();
                $table->json('employees')->nullable();
                $table->json('assets')->nullable();
                $table->json('yearly_growth_rates')->nullable();
                $table->json('funding_sources')->nullable();
                $table->json('projections_data')->nullable();
                $table->timestamps();
            });
        } else {
            // Update existing projections table
            Schema::table('projections', function (Blueprint $table) {
                // Remove old fields if they exist
                if (Schema::hasColumn('projections', 'baseline_revenue')) {
                    $table->dropColumn('baseline_revenue');
                }
                if (Schema::hasColumn('projections', 'products')) {
                    $table->dropColumn('products');
                }
                
                // Add new fields for unit-based projection
                if (!Schema::hasColumn('projections', 'baseline_units_sold')) {
                    $table->integer('baseline_units_sold')->after('business_name');
                }
                if (!Schema::hasColumn('projections', 'product_distribution')) {
                    $table->json('product_distribution')->nullable()->after('baseline_units_sold');
                }
            });
        }

        // Create products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projection_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->decimal('selling_price', 15, 2);
            $table->decimal('sales_percentage', 5, 2); // Percentage of total sales
            $table->timestamps();
        });

        // Create raw_materials table
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->decimal('cost_per_unit', 15, 2);
            $table->decimal('quantity', 10, 4); // Quantity needed per product unit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop new tables
        Schema::dropIfExists('raw_materials');
        Schema::dropIfExists('products');
        
        // Restore projections table
        Schema::table('projections', function (Blueprint $table) {
            $table->dropColumn(['baseline_units_sold', 'product_distribution']);
            $table->decimal('baseline_revenue', 15, 2)->after('business_name');
            $table->json('products')->nullable()->after('assets');
        });
    }
};
