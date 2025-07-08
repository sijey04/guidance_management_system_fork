<?php
// Database reset script
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'port' => 3306,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    // Connect to MySQL server (not specific database)
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306", 'root', '');
    
    // Drop and recreate database
    $pdo->exec("DROP DATABASE IF EXISTS guidance_management_system");
    $pdo->exec("CREATE DATABASE guidance_management_system");
    
    echo "Database dropped and recreated successfully!\n";
    
    // Now import the SQL file
    $pdo->exec("USE guidance_management_system");
    
    $sqlFile = 'guidance_management_system (18).sql';
    $sql = file_get_contents($sqlFile);
    
    // Remove comments and problematic statements
    $sql = preg_replace('/\/\*.*?\*\//s', '', $sql);
    $sql = preg_replace('/^--.*$/m', '', $sql);
    
    // Split SQL into individual statements more carefully
    $statements = [];
    $current = '';
    $inString = false;
    $stringChar = '';
    
    for ($i = 0; $i < strlen($sql); $i++) {
        $char = $sql[$i];
        
        if (!$inString && ($char === '"' || $char === "'")) {
            $inString = true;
            $stringChar = $char;
        } elseif ($inString && $char === $stringChar && $sql[$i-1] !== '\\') {
            $inString = false;
            $stringChar = '';
        } elseif (!$inString && $char === ';') {
            $statement = trim($current);
            if (!empty($statement)) {
                $statements[] = $statement;
            }
            $current = '';
            continue;
        }
        
        $current .= $char;
    }
    
    // Add last statement if exists
    $statement = trim($current);
    if (!empty($statement)) {
        $statements[] = $statement;
    }
    
    echo "Found " . count($statements) . " SQL statements\n";
    
    $executed = 0;
    $skipped = 0;
    
    foreach ($statements as $index => $statement) {
        $statement = trim($statement);
        if (empty($statement)) continue;
        
        // Skip certain statements that might cause issues
        if (stripos($statement, 'SET SQL_MODE') === 0 ||
            stripos($statement, 'START TRANSACTION') === 0 ||
            stripos($statement, 'COMMIT') === 0 ||
            stripos($statement, 'SET time_zone') === 0 ||
            stripos($statement, 'SET @OLD_') === 0 ||
            stripos($statement, 'SET NAMES') === 0 ||
            stripos($statement, '/*!') === 0) {
            $skipped++;
            continue;
        }
        
        try {
            $pdo->exec($statement);
            $executed++;
            if ($executed % 10 === 0) {
                echo "Executed $executed statements...\n";
            }
        } catch (Exception $e) {
            echo "Warning: Statement " . ($index + 1) . " failed: " . $e->getMessage() . "\n";
            $skipped++;
        }
    }
    
    echo "SQL file imported successfully!\n";
    echo "Executed: $executed statements\n";
    echo "Skipped: $skipped statements\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
