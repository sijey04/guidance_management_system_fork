<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalTransitionIdToStudentTransitionsTable extends Migration
{
    public function up()
    {
        Schema::table('student_transition', function (Blueprint $table) {
            $table->unsignedBigInteger('original_transition_id')->nullable()->after('id');

            $table->foreign('original_transition_id')
                  ->references('id')
                  ->on('student_transitions')
                  ->onDelete('set null');
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
