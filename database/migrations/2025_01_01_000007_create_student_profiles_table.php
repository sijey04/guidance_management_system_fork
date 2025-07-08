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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('semester_id')->constrained('semesters');
            $table->string('course')->nullable();
            $table->string('section')->nullable();
            $table->timestamps();
            $table->string('home_address')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('parent_guardian_name')->nullable();
            $table->string('parent_guardian_contact')->nullable();
            $table->integer('number_of_sisters')->nullable();
            $table->integer('number_of_brothers')->nullable();
            $table->integer('ordinal_position')->nullable();
            $table->string('enrolled_semester')->nullable();
            $table->date('enrollment_date')->nullable();
            $table->string('year_level')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
