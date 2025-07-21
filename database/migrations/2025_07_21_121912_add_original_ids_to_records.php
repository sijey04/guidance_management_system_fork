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
       Schema::table('referrals', function (Blueprint $table) {
            $table->unsignedBigInteger('original_referral_id')->nullable()->after('id');

            $table->foreign('original_referral_id', 'fk_original_referral')
                ->references('id')
                ->on('referrals')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('records', function (Blueprint $table) {
            //
        });
    }
};
