<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Marking System Migrations as Completed\n\n";

// System migrations that correspond to existing tables
$systemMigrations = [
    '0001_01_01_000000_create_users_table',
    '0001_01_01_000001_create_cache_table',
    '0001_01_01_000002_create_jobs_table',
    '0001_01_01_000003_create_sessions_table',
];

try {
    foreach ($systemMigrations as $migration) {
        try {
            DB::table('migrations')->insert([
                'migration' => $migration,
                'batch' => 1
            ]);
            echo "✅ Marked: {$migration}\n";
        } catch (Exception $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                echo "ℹ️  Already exists: {$migration}\n";
            } else {
                echo "❌ Error with {$migration}: " . $e->getMessage() . "\n";
            }
        }
    }
    
    echo "\n🚀 Now run 'php artisan migrate' to continue with application migrations\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n✅ System migrations marked as completed!\n";
