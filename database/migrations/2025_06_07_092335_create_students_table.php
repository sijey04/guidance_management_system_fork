<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->string('student_id', 50)->unique()->nullable(false); // Counselor-provided ID, UNIQUE
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->integer('age')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('course_year', 50)->nullable();
            $table->string('home_address', 255)->nullable();
            $table->string('father_occupation', 100)->nullable();
            $table->string('mother_occupation', 100)->nullable();
            $table->unsignedInteger('number_of_sisters')->nullable();
            $table->unsignedInteger('number_of_brothers')->nullable();
            $table->unsignedInteger('ordinal_position')->nullable();
            $table->enum('enrollment_status', ['Enrolled', 'Not Enrolled'])->default('Enrolled');
          //  $table->date('enrollment_date')->nullable();
          //  $table->string('enrolled_semester', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
