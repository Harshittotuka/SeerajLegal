<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Team member's name
            $table->string('designation'); // Designation of the member
            $table->json('roles'); // JSON field to store a list of roles
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
