<?php
// Check database tables
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'guidance_management_system',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    $tables = $capsule->select('SHOW TABLES');
    
    echo "Database tables:\n";
    echo "================\n";
    foreach ($tables as $table) {
        $tableName = array_values((array) $table)[0];
        echo "- $tableName\n";
    }
    
    echo "\nTotal tables: " . count($tables) . "\n";
    
    // Check if some key tables exist
    $keyTables = ['users', 'students', 'counselings', 'contracts', 'referrals'];
    echo "\nKey tables status:\n";
    foreach ($keyTables as $table) {
        $exists = $capsule->schema()->hasTable($table);
        echo "- $table: " . ($exists ? 'EXISTS' : 'MISSING') . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
