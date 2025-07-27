<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Fixing Users Migration Conflict\n\n";

try {
    // Insert the users migration record so Laravel thinks it's already run
    DB::table('migrations')->insert([
        'migration' => '0001_01_01_000000_create_users_table',
        'batch' => 1
    ]);
    
    echo "✅ Marked users table migration as completed\n";
    
    echo "\n🚀 Now run 'php artisan migrate' to continue with other migrations\n";

} catch (Exception $e) {
    if (str_contains($e->getMessage(), 'Duplicate entry')) {
        echo "ℹ️  Users migration already marked as completed\n";
    } else {
        echo "❌ Error: " . $e->getMessage() . "\n";
    }
}

echo "\n✅ Ready to continue migrations!\n";
