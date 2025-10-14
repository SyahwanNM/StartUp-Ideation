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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('packaging_cost', 15, 2)->nullable()->after('selling_price')->comment('Biaya kemasan per unit');
            $table->decimal('direct_labor_cost', 15, 2)->nullable()->after('packaging_cost')->comment('Biaya tenaga kerja langsung per unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['packaging_cost', 'direct_labor_cost']);
        });
    }
};

