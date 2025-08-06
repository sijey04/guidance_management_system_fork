#!/bin/bash

# Railway Migration Script
# This script ensures all migrations run properly on Railway deployment

echo "🚀 Starting Railway Migration Process..."

# Check if we're in a Railway environment
if [ -n "$RAILWAY_ENVIRONMENT" ]; then
    echo "✅ Running in Railway environment: $RAILWAY_ENVIRONMENT"
else
    echo "⚠️ Not detected as Railway environment, but proceeding..."
fi

# Check database connection
echo "🔍 Checking database connection..."
php artisan tinker --execute="
try { 
    \$pdo = DB::connection()->getPdo(); 
    echo 'Database connection successful\n';
    echo 'Database: ' . \$pdo->query('SELECT DATABASE()')->fetchColumn() . '\n';
} catch (Exception \$e) { 
    echo 'Database connection failed: ' . \$e->getMessage() . '\n';
    exit(1);
}"

# Show current migration status
echo "📋 Current migration status:"
php artisan migrate:status

# Run all pending migrations
echo "🔄 Running pending migrations..."
php artisan migrate --force --no-interaction --verbose

# Specifically check for the deleted_at column
echo "🔍 Checking if deleted_at column was added to contracts table..."
php artisan tinker --execute="
try {
    \$hasColumn = Schema::hasColumn('contracts', 'deleted_at');
    if (\$hasColumn) {
        echo '✅ deleted_at column exists in contracts table\n';
    } else {
        echo '❌ deleted_at column is still missing from contracts table\n';
        // Try to run the specific migration
        echo 'Attempting to run specific migration...\n';
        Artisan::call('migrate', [
            '--path' => 'database/migrations/2025_07_25_005042_add_deleted_at_to_contracts_table.php',
            '--force' => true
        ]);
        echo Artisan::output();
    }
} catch (Exception \$e) {
    echo 'Error checking column: ' . \$e->getMessage() . '\n';
}"

# Final migration status
echo "📊 Final migration status:"
php artisan migrate:status

echo "✅ Railway migration process completed!"
