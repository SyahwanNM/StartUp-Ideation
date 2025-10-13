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
        Schema::create('tam_sam_soms', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('industry');
            $table->string('location');
            
            // TAM fields
            $table->text('tam_description');
            $table->bigInteger('tam_market_size');
            $table->decimal('tam_unit_value', 15, 2);
            $table->decimal('tam_value', 20, 2);
            
            // SAM fields
            $table->text('sam_description');
            $table->decimal('sam_percentage', 5, 2);
            $table->bigInteger('sam_market_size');
            $table->decimal('sam_value', 20, 2);
            
            // SOM fields
            $table->text('som_description');
            $table->decimal('som_percentage', 5, 2);
            $table->bigInteger('som_market_size');
            $table->decimal('som_value', 20, 2);
            
            // Additional fields
            $table->json('market_assumptions')->nullable();
            $table->json('growth_projections')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tam_sam_soms');
    }
};
