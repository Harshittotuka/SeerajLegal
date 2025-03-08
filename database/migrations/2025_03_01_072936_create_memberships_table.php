<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Name of the member
            $table->string('membership_type'); // defaults to VARCHAR(255)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
