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
            $table->id();
            $table->string('student_id', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->date('birthday')->nullable();
            $table->enum('suffix', ['Jr.', 'Sr.', 'III', 'IV', 'None'])->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('course')->nullable();
            $table->string('home_address')->nullable();
            $table->string('father_occupation', 100)->nullable();
            $table->string('mother_occupation', 100)->nullable();
            $table->string('parent_guardian_name')->nullable();
            $table->string('parent_guardian_contact');
            $table->unsignedInteger('number_of_sisters')->nullable();
            $table->unsignedInteger('number_of_brothers')->nullable();
            $table->unsignedInteger('ordinal_position')->nullable();
            $table->enum('enrollment_status', ['Enrolled', 'Not Enrolled'])->default('Enrolled');
            $table->date('enrollment_date')->nullable();
            $table->string('enrolled_semester', 50)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->string('section')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('student_contact')->nullable();
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
