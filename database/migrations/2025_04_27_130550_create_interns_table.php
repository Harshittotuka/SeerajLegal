<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('dob');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->string('collegeName');
            $table->string('degree');
            $table->year('graduationYear');
$table->string('membershipType')->nullable();
$table->text('coverLetter')->nullable();
            $table->string('resumePath');       // <-- new (file path of uploaded pdf)
            $table->enum('status', [
                'pending', 
                'rejected', 
                'payment-pending', 
                'payment-done-waiting-for-approval', 
                'approved'
            ])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interns');
    }
}
