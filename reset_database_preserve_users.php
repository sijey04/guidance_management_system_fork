<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Railway Database Reset - Preserving Users Only\n\n";

try {
    // Use Laravel's DB facade
    $pdo = DB::connection()->getPdo();
    
    echo "🔓 Disabling foreign key checks...\n";
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    // Get all tables
    $tables = DB::select('SHOW TABLES');
    $tableColumn = 'Tables_in_' . config('database.connections.mysql.database');
    
    // Tables to preserve completely
    $preserveTables = ['users'];
    
    // System tables to preserve but can be recreated
    $systemTables = ['cache', 'cache_locks', 'failed_jobs', 'job_batches', 'jobs', 'sessions'];
    
    echo "📋 Processing tables:\n";
    
    foreach ($tables as $table) {
        $tableName = $table->{$tableColumn};
        
        if (in_array($tableName, $preserveTables)) {
            echo "   🔒 PRESERVING: {$tableName}\n";
            continue;
        }
        
        if (in_array($tableName, $systemTables)) {
            echo "   🧹 TRUNCATING: {$tableName}\n";
            try {
                DB::table($tableName)->truncate();
            } catch (Exception $e) {
                echo "      ⚠️  Could not truncate {$tableName}: " . $e->getMessage() . "\n";
            }
            continue;
        }
        
        // Drop all other tables
        echo "   🗑️  DROPPING: {$tableName}\n";
        try {
            DB::statement("DROP TABLE `{$tableName}`");
        } catch (Exception $e) {
            echo "      ⚠️  Could not drop {$tableName}: " . $e->getMessage() . "\n";
        }
    }

    echo "\n🔒 Re-enabling foreign key checks...\n";
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    // Count remaining users
    $userCount = DB::table('users')->count();
    
    echo "\n✅ Database reset completed!\n";
    echo "📊 Summary:\n";
    echo "   - Users preserved: {$userCount} records\n";
    echo "   - All other tables dropped for clean migration\n";
    echo "   - System tables cleared but preserved\n";
    
    echo "\n🚀 Run 'php artisan migrate' to recreate the database structure!\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n🎉 Ready for fresh migrations!\n";
