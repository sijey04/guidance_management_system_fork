<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contract_types', function (Blueprint $table) {
            $table->boolean('requires_total_days')->default(false);
            $table->boolean('requires_start_date')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('contract_types', function (Blueprint $table) {
            $table->dropColumn(['requires_total_days', 'requires_start_date']);
        });
    }
};
