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
        Schema::dropIfExists('financial_projections');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Note: This migration only drops the table
        // If you need to recreate it, you would need to run the original migration
    }
};
