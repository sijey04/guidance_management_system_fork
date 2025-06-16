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
        Schema::create('counselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->date('session_date');
            $table->string('referred_by')->nullable();
            $table->text('statement_of_problem');
            $table->text('tests_administered')->nullable();
            $table->text('evaluation')->nullable();
            $table->text('recommendation_action_taken')->nullable();
            $table->text('follow_up')->nullable();
            $table->string('guidance_counselor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counselings');
    }
};
