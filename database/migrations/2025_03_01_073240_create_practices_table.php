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
            $table->string('title')->nullable(); // Title of the paragraph
            $table->text('para')->nullable(); // Paragraph content
            $table->json('points')->nullable(); // Additional points
            $table->json('what_we_provide')->nullable(); // JSON field for what we provide
            $table->enum('flag', ['enabled', 'disabled','null'])->default('enabled'); // Flag to enable or disable the practice
            $table->timestamps(); // Created at and Updated at timestamps
            $table->string('image_path')->nullable();
            $table->string('top_image')->nullable(); // Nullable top image path // Field to store image path or URL
            $table->string('icon')->nullable(); // Field to store image path or URL
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('practices');
    }
};
