<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE student_transition MODIFY transition_type ENUM(
            'Shiftee',
            'Transferee',
            'Returnee',
            'Stopped',
            'None',
            'Shifting In',
            'Shifting Out',
            'Transferring In',
            'Transferring Out',
            'Dropped',
            'Returning Student'
        ) NOT NULL");

        DB::table('student_transition')->where('transition_type', 'Shiftee')->update(['transition_type' => 'Shifting Out']);
        DB::table('student_transition')->where('transition_type', 'Transferee')->update(['transition_type' => 'Transferring Out']);
        DB::table('student_transition')->where('transition_type', 'Returnee')->update(['transition_type' => 'Returning Student']);
        DB::table('student_transition')->where('transition_type', 'Stopped')->update(['transition_type' => 'Dropped']);

        DB::statement("ALTER TABLE student_transition MODIFY transition_type ENUM(
            'None',
            'Shifting In',
            'Shifting Out',
            'Transferring In',
            'Transferring Out',
            'Dropped',
            'Returning Student'
        ) NOT NULL");
    }

    public function down(): void
    {
        // Optional: revert back to original enum types if needed
        DB::statement("ALTER TABLE student_transition MODIFY transition_type ENUM(
            'Shiftee',
            'Transferee',
            'Returnee',
            'Dropped',
            'Stopped'
        ) NOT NULL");
    }
};
