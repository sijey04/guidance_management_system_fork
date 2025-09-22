<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if users already exist to avoid truncating
        $existingUsers = DB::table('users')->count();
        
        if ($existingUsers == 0) {
            // Only seed if no users exist
            DB::table('users')->insert([
                'name' => 'John Magno',
                'email' => 'johnmagno332@gmail.com',
                'password' => Hash::make('johnmagnoA1'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('users')->insert([
                'name' => 'Admin User',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 