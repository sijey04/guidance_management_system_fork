<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Load environment variables from Railway (Laravel way)
$host = config('database.connections.mysql.host');
$port = config('database.connections.mysql.port');
$database = config('database.connections.mysql.database');
$username = config('database.connections.mysql.username');
$password = config('database.connections.mysql.password');

echo "🚀 Starting Railway Database Clear (Preserving Users Table)\n";
echo "Database: {$database}\n";
echo "Host: {$host}:{$port}\n\n";

try {
    $pdo = new PDO("mysql:host={$host};port={$port};dbname={$database}", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // Disable foreign key checks to allow truncation
    echo "🔓 Disabling foreign key checks...\n";
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0");

    // Get list of all tables except users and system tables
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $systemTables = ['users', 'cache', 'cache_locks', 'failed_jobs', 'job_batches', 'jobs', 'sessions'];
    $tablesToClear = array_filter($tables, function($table) use ($systemTables) {
        return !in_array($table, $systemTables);
    });

    echo "📋 Tables to clear:\n";
    foreach ($tablesToClear as $table) {
        echo "   - {$table}\n";
    }
    echo "\n";

    echo "🗑️  Tables to preserve:\n";
    foreach ($systemTables as $table) {
        if (in_array($table, $tables)) {
            echo "   - {$table} ✅\n";
        }
    }
    echo "\n";

    // Clear each table
    echo "🧹 Clearing tables...\n";
    foreach ($tablesToClear as $table) {
        try {
            $pdo->exec("TRUNCATE TABLE `{$table}`");
            echo "   ✅ Cleared: {$table}\n";
        } catch (Exception $e) {
            echo "   ❌ Failed to clear {$table}: " . $e->getMessage() . "\n";
        }
    }

    // Re-enable foreign key checks
    echo "\n🔒 Re-enabling foreign key checks...\n";
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

    echo "\n✅ Database clearing completed!\n";
    echo "📊 Summary:\n";
    echo "   - Tables cleared: " . count($tablesToClear) . "\n";
    echo "   - Tables preserved: " . count(array_intersect($systemTables, $tables)) . "\n";
    
    // Verify users table still has data
    $userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    echo "   - Users preserved: {$userCount} records\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n🎉 Railway database successfully cleared (users table preserved)!\n";
