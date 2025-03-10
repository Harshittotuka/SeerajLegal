<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Name of the expert
            $table->string('designation')->nullable(); // Designation (e.g., Arbitrator, Mediator)
            $table->json('area_of_practice')->nullable(); // Legal area of practice (Changed to JSON)
            $table->json('adr_services')->nullable(); // ADR services offered (Changed to JSON)
            $table->boolean('all_rounder')->default(false); // Indicates if the expert is an all-rounder
            $table->string('type')->nullable(); // Type of expert
            $table->string('email')->unique()->nullable(); // Email of the expert
            $table->string('phone')->nullable(); // Phone number of the expert
            $table->json('experience')->nullable(); // Experience details (Changed to JSON array)
            $table->json('education')->nullable(); // Education details (Changed to JSON array)
            $table->json('awards')->nullable(); // Awards received (Changed to JSON array)
            $table->json('socials')->nullable(); // Social links (Should store multiple links)
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
