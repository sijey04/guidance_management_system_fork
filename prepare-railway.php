#!/usr/bin/env php
<?php
/**
 * Railway Deployment Preparation Script
 * This script prepares your Laravel application for Railway deployment
 */

echo "🚀 Preparing Laravel app for Railway deployment...\n\n";

// Check if we're in a Laravel project
if (!file_exists('artisan')) {
    echo "❌ Error: This doesn't appear to be a Laravel project.\n";
    echo "Please run this script from your Laravel project root.\n";
    exit(1);
}

// Check if composer is installed
if (!exec('composer --version')) {
    echo "❌ Error: Composer is not installed or not in PATH.\n";
    exit(1);
}

// Install dependencies
echo "📦 Installing PHP dependencies...\n";
exec('composer install --optimize-autoloader --no-dev', $output, $return);
if ($return !== 0) {
    echo "❌ Failed to install PHP dependencies.\n";
    exit(1);
}

// Install Node dependencies
echo "📦 Installing Node.js dependencies...\n";
exec('npm install', $output, $return);
if ($return !== 0) {
    echo "❌ Failed to install Node.js dependencies.\n";
    exit(1);
}

// Build assets
echo "🔨 Building assets...\n";
exec('npm run build', $output, $return);
if ($return !== 0) {
    echo "❌ Failed to build assets.\n";
    exit(1);
}

// Clear and cache config
echo "🔧 Optimizing Laravel...\n";
exec('php artisan config:clear');
exec('php artisan config:cache');
exec('php artisan route:cache');
exec('php artisan view:cache');

// Generate app key if not exists
if (!env('APP_KEY')) {
    echo "🔑 Generating application key...\n";
    exec('php artisan key:generate');
}

echo "✅ Laravel app is ready for Railway deployment!\n\n";
echo "📋 Next steps:\n";
echo "1. Push your code to GitHub/GitLab\n";
echo "2. Connect your repository to Railway\n";
echo "3. Add MySQL database service\n";
echo "4. Configure environment variables\n";
echo "5. Deploy!\n\n";
echo "📖 See RAILWAY_DEPLOYMENT.md for detailed instructions.\n";
