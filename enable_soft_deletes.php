<?php

// Script to re-enable SoftDeletes after migration
echo "🔧 Re-enabling SoftDeletes for Contract model\n";

$contractModelPath = __DIR__ . '/app/Models/Contract.php';

if (file_exists($contractModelPath)) {
    $content = file_get_contents($contractModelPath);
    
    // Replace the commented line with the active use statement
    $updated = str_replace(
        '    // Temporarily disabled until deleted_at column migration runs
    // use SoftDeletes;',
        '    use SoftDeletes;',
        $content
    );
    
    if ($updated !== $content) {
        file_put_contents($contractModelPath, $updated);
        echo "✅ SoftDeletes re-enabled in Contract model\n";
    } else {
        echo "ℹ️ SoftDeletes already enabled or not found\n";
    }
} else {
    echo "❌ Contract model file not found\n";
}

// Verify the deleted_at column exists
try {
    // Check if we can connect to database
    $pdo = new PDO(
        "mysql:host=" . ($_ENV['DB_HOST'] ?? '127.0.0.1') . 
        ";port=" . ($_ENV['DB_PORT'] ?? '3306') . 
        ";dbname=" . ($_ENV['DB_DATABASE'] ?? 'guidance_management_system'),
        $_ENV['DB_USERNAME'] ?? 'root',
        $_ENV['DB_PASSWORD'] ?? ''
    );
    
    $stmt = $pdo->query("SHOW COLUMNS FROM contracts LIKE 'deleted_at'");
    if ($stmt->fetch()) {
        echo "✅ deleted_at column exists in contracts table\n";
    } else {
        echo "❌ deleted_at column still missing from contracts table\n";
    }
} catch (Exception $e) {
    echo "⚠️ Could not verify database column: " . $e->getMessage() . "\n";
}

echo "✅ Script completed!\n";
