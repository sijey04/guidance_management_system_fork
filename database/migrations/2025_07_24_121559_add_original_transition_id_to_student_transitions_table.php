<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalTransitionIdToStudentTransitionsTable extends Migration
{
    public function up()
    {
        Schema::table('student_transition', function (Blueprint $table) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('student_transition', 'original_transition_id')) {
                $table->unsignedBigInteger('original_transition_id')->nullable()->after('id');
            }

            // Check if foreign key constraint doesn't exist before adding
            $foreignKeys = Schema::getConnection()->getDoctrineSchemaManager()
                ->listTableForeignKeys('student_transition');
            
            $hasOriginalTransitionForeignKey = false;
            foreach ($foreignKeys as $foreignKey) {
                if (in_array('original_transition_id', $foreignKey->getLocalColumns())) {
                    $hasOriginalTransitionForeignKey = true;
                    break;
                }
            }

            if (!$hasOriginalTransitionForeignKey) {
                $table->foreign('original_transition_id')
                      ->references('id')
                      ->on('student_transitions')
                      ->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('student_transition', function (Blueprint $table) {
            $table->dropForeign(['original_transition_id']);
            $table->dropColumn('original_transition_id');
        });
    }
}
