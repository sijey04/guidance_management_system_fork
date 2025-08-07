#!/bin/bash

# Railway Seeder Script
# This script runs the UserSeeder on Railway deployment

echo "🌱 Starting Railway Seeder Process..."

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

# Check if users table exists
echo "🔍 Checking if users table exists..."
php artisan tinker --execute="
try {
    \$hasTable = Schema::hasTable('users');
    if (\$hasTable) {
        echo '✅ users table exists\n';
        \$count = DB::table('users')->count();
        echo 'Current user count: ' . \$count . '\n';
    } else {
        echo '❌ users table does not exist. Please run migrations first.\n';
        exit(1);
    }
} catch (Exception \$e) {
    echo 'Error checking table: ' . \$e->getMessage() . '\n';
    exit(1);
}"

# Run the UserSeeder
echo "🌱 Running UserSeeder..."
php artisan db:seed --class=UserSeeder --force --no-interaction --verbose

# Verify seeding result
echo "🔍 Verifying seeding results..."
php artisan tinker --execute="
try {
    \$users = DB::table('users')->select('name', 'email')->get();
    echo 'Users in database after seeding:\n';
    foreach (\$users as \$user) {
        echo '- ' . \$user->name . ' (' . \$user->email . ')\n';
    }
    echo 'Total users: ' . \$users->count() . '\n';
} catch (Exception \$e) {
    echo 'Error verifying results: ' . \$e->getMessage() . '\n';
}"

echo "✅ Railway seeding process completed!"
