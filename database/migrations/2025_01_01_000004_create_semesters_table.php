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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->enum('semester', ['1st', '2nd', 'Summer']);
            $table->boolean('is_current')->default(false);
            $table->timestamps();
            $table->boolean('is_active')->default(false);
            $table->foreignId('school_year_id')->constrained('school_years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
