<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if there's already an active school year
        $activeSchoolYear = DB::table('school_years')->where('is_active', 1)->first();
        
        if (!$activeSchoolYear) {
            // Create a default active school year
            DB::table('school_years')->insert([
                'year' => '2024-2025',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}