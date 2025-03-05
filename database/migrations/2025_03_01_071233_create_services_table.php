<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('service_name'); // Name of the service
            $table->integer('para_sno'); // Serial number for paragraph
            $table->string('title')->nullable();; // Title of the paragraph
            $table->text('para')->nullable();; // Paragraph content
            $table->json('points')->nullable(); // Points related to the service
            $table->text('rules')->nullable();; // JSON field for rules
            $table->enum('flag', ['enabled', 'disabled','null'])->default('enabled'); // Flag to enable or disable the service
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
