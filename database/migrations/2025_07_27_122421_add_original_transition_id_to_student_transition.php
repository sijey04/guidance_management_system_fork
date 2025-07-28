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
            if (!Schema::hasColumn('student_transition', 'original_transition_id')) {
                $table->unsignedBigInteger('original_transition_id')->nullable()->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_transition', function (Blueprint $table) {
            if (Schema::hasColumn('student_transition', 'original_transition_id')) {
                $table->dropColumn('original_transition_id');
            }
        });
    }
};
