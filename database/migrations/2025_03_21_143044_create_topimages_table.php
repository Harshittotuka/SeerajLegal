<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('topimages', function (Blueprint $table) {
            $table->id();
            $table->string('image_id')->unique(); // Unique image ID
            $table->string('page_name');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('image_url')->nullable();
            $table->json('image_resolution')->nullable(); // Store resolution as JSON
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('topimages');
    }
};
