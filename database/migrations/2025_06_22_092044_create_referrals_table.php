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
             $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('reason'); // e.g., "Behavioral", "Academic"
            $table->string('remarks')->nullable();
            $table->string('image_path')->nullable(); // file path for attachment
            $table->date('referral_date');
            $table->timestamps();
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
