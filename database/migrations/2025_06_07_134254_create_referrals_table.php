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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id('referral_id'); 
            $table->unsignedBigInteger('student_id');
            $table->date('date')->nullable(false);
            $table->text('reason')->nullable(false);
            $table->string('referred_to', 100);
            $table->string('referred_by', 100); 
            $table->text('action_taken');
            $table->timestamps(); 

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
