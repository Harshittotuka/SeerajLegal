<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('membership_types', function (Blueprint $table) {
            $table->id();
            $table->string('membership_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_types');
    }
};
