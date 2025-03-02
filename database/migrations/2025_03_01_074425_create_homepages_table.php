<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('title')->nullable();; // Title of the section
            $table->text('para')->nullable();; // Paragraph content
            $table->json('points')->nullable(); // Additional points (nullable)
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the section
            $table->string('image')->nullable(); // Image path (nullable)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage');
    }
};
