<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('email')->unique(); // Email address (unique)
            $table->text('address'); // Address
            $table->string('phone_no'); // Primary phone number
            $table->string('phone_2')->nullable(); // Secondary phone number (optional)
            $table->integer('yrs_of_experience')->default(0); // Years of experience
            $table->string('insta_link')->nullable(); // Instagram link
            $table->string('facebook_link')->nullable(); // Facebook link
            $table->string('youtube_link')->nullable(); // YouTube link
            $table->string('twitter_link')->nullable(); // Twitter link
            $table->string('whatsapp')->nullable(); // WhatsApp contact number
            $table->string('linkedin')->nullable(); // LinkedIn profile link
            $table->string('website_link')->nullable(); // Website link
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
