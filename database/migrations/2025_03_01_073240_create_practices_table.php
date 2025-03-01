<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('practice_name'); // Name of the practice
            $table->integer('para_sno'); // Serial number for paragraph
            $table->string('title'); // Title of the paragraph
            $table->text('para'); // Paragraph content
            $table->json('points')->nullable(); // Additional points
            $table->json('what_we_provide'); // JSON field for what we provide
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('practices');
    }
};
