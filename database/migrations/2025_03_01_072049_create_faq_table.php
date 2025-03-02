<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id('Sno');
            $table->text('Question');
            $table->text('Answer');
            $table->timestamps(); // adds 'created_at' and 'updated_at'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq');
    }
};
