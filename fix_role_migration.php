<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Handling Role Migration Conflict\n\n";

try {
    // Check if role column exists
    $hasRoleColumn = DB::select("SHOW COLUMNS FROM users LIKE 'role'");
    
    if (!empty($hasRoleColumn)) {
        echo "✅ Role column already exists in users table\n";
        
        // Mark migration as completed
        DB::table('migrations')->insert([
            'migration' => '2025_07_12_081547_add_role_to_users_table',
            'batch' => 2
        ]);
        
        echo "✅ Marked role migration as completed\n";
    } else {
        echo "❌ Role column does not exist - this shouldn't happen\n";
    }
    
    echo "\n🚀 Run 'php artisan migrate' again to continue\n";

} catch (Exception $e) {
    if (str_contains($e->getMessage(), 'Duplicate entry')) {
        echo "ℹ️  Role migration already marked as completed\n";
    } else {
        echo "❌ Error: " . $e->getMessage() . "\n";
    }
}

echo "\n✅ Ready to continue!\n";
