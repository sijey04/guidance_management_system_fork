<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        DB::statement("
            ALTER TABLE student_transition 
            MODIFY COLUMN transition_type ENUM(
                'None',
                'Shifting In',
                'Shifting Out',
                'Transferring In',
                'Transferring Out',
                'Dropped',
                'Returning Student'
            ) NOT NULL
        ");
    }

    public function down()
    {
        DB::statement("
            ALTER TABLE student_transition
            MODIFY COLUMN transition_type ENUM(
                'None',
                'Shifting Out',
                'Transferring In',
                'Transferring Out',
                'Dropped',
                'Returning Student'
            ) NOT NULL
        ");
    }
};
