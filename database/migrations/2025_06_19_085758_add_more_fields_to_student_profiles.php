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
        Schema::table('student_profiles', function (Blueprint $table) {
             $table->string('home_address')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('parent_guardian_name');
            $table->string('parent_guardian_contact');
            $table->integer('number_of_sisters')->nullable();
            $table->integer('number_of_brothers')->nullable();
            $table->integer('ordinal_position')->nullable();
            $table->string('enrolled_semester')->nullable();
            $table->date('enrollment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            //
        });
    }
};
