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
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Name of the expert
            $table->string('designation')->nullable(); // Designation (e.g., Arbitrator, Mediator)
            $table->json('area_of_practice')->nullable(); // Legal area of practice (Changed to JSON)
            $table->json('adr_services')->nullable(); // ADR services offered (Changed to JSON)
            $table->boolean('all_rounder')->default(false); // Indicates if the expert is an all-rounder
            $table->string('type')->nullable(); // Type of expert
            $table->timestamps(); // Created_at and Updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            //
        });
    }
};
