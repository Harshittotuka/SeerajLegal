<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('title')->nullable(); // Title of the AboutUs
            $table->text('para')->nullable(); // Paragraph content
            $table->json('points')->nullable(); // Additional points related to the article
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the article
            $table->string('image')->nullable(); // Image path
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
