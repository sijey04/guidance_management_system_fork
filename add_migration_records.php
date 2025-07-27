<?php

try {
    $pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'), 
        getenv('DB_USERNAME'), 
        getenv('DB_PASSWORD')
    );
    
    echo "Adding migration records to Railway database...\n\n";
    
    // Get the current highest batch number
    $stmt = $pdo->query('SELECT MAX(batch) as max_batch FROM migrations');
    $maxBatch = $stmt->fetch()['max_batch'];
    $newBatch = $maxBatch + 1;
    
    echo "Current max batch: $maxBatch\n";
    echo "New batch will be: $newBatch\n\n";
    
    // Add the new migration records
    $migrations = [
        '2025_07_27_122422_add_carried_over_from_id_to_contracts_table',
        '2025_07_27_122440_add_original_transition_id_foreign_key_to_student_transition'
    ];
    
    foreach ($migrations as $migration) {
        // Check if migration already exists
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM migrations WHERE migration = ?');
        $stmt->execute([$migration]);
        $exists = $stmt->fetchColumn();
        
        if ($exists) {
            echo "⚠️  Migration already exists: $migration\n";
        } else {
            $stmt = $pdo->prepare('INSERT INTO migrations (migration, batch) VALUES (?, ?)');
            $result = $stmt->execute([$migration, $newBatch]);
            
            if ($result) {
                echo "✅ Added migration: $migration (batch $newBatch)\n";
            } else {
                echo "❌ Failed to add migration: $migration\n";
            }
        }
    }
    
    echo "\nVerifying migration records...\n";
    $stmt = $pdo->query('SELECT COUNT(*) as total FROM migrations');
    $totalMigrations = $stmt->fetch()['total'];
    echo "Total migrations now: $totalMigrations\n";
    
    // Show the last few migrations
    echo "\nLast 5 migrations:\n";
    $stmt = $pdo->query('SELECT id, migration, batch FROM migrations ORDER BY id DESC LIMIT 5');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "  {$row['id']}: {$row['migration']} (batch {$row['batch']})\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
