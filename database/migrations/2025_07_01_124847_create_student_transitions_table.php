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
        Schema::create('student_transition', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->enum('transition_type', ['Shiftee', 'Transferee', 'Returnee', 'Dropped', 'Stopped']);
            $table->string('from_program')->nullable(); 
            $table->string('to_program')->nullable();   
            $table->text('reason_leaving')->nullable();
            $table->text('reason_returning')->nullable();
            $table->text('leave_reason')->nullable();
            $table->date('transition_date');
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_transitions');
    }
};
