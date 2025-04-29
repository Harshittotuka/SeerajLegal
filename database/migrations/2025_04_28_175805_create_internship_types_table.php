<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('internship_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->integer('priority')->unique()->default(0); // used for showing in order
            $table->decimal('price', 10, 2)->default(0.00);
            $table->text('description')->nullable(); // description in points
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internship_types');
    }
};
