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
        Schema::create('student_semester_enrollments', function (Blueprint $table) {
           $table->id();
            
            // Foreign keys
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('semester_id');
            
            // Enrollment status
            $table->boolean('is_enrolled')->default(true); // true = enrolled, false = unenrolled
            
            
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            
            $table->unique(['student_id', 'semester_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_semester_enrollments');
    }
};
