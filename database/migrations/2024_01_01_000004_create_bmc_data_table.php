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
        Schema::create('bmc_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->json('customer_segments');
            $table->json('value_propositions');
            $table->json('channels');
            $table->json('customer_relationships');
            $table->json('revenue_streams');
            $table->json('key_resources');
            $table->json('key_activities');
            $table->json('key_partnerships');
            $table->json('cost_structure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmc_data');
    }
};
