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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('semester_id')->constrained('semesters');
            $table->date('contract_date');
            $table->string('contract_image')->nullable();
            $table->integer('total_days')->nullable();
            $table->integer('completed_days')->nullable();
            $table->enum('status', ['In Progress', 'Completed'])->default('In Progress');
            $table->timestamps();
            $table->string('contract_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
