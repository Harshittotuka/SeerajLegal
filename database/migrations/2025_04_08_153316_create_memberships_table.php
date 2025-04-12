<?php

// Migration: create_memberships_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->date('dob');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->string('aadharName');
            $table->string('aadharNumber');
            $table->string('aadharImage')->nullable();
            $table->string('panName');
            $table->string('panNumber');
            $table->string('panImage')->nullable();
            $table->string('degreeProof')->nullable();
            $table->string('certificationProof')->nullable();
            $table->string('membershipType');
            $table->enum('status', ['pending', 'approved', 'rejected','confirmed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
