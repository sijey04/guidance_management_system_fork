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
        Schema::table('student_transition', function (Blueprint $table) {
            // Add foreign key constraint for original_transition_id (column already exists)
            $table->foreign('original_transition_id')->references('id')->on('student_transition')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_transition', function (Blueprint $table) {
            $table->dropForeign(['original_transition_id']);
        });
    }
};
