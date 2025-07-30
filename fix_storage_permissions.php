<?php

// Fix storage permissions and create missing directories
echo "🔧 Fixing storage permissions and directories\n";

$directories = [
    'storage/logs',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/app/public',
    'bootstrap/cache'
];

foreach ($directories as $dir) {
    $fullPath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $dir);
    
    if (!is_dir($fullPath)) {
        mkdir($fullPath, 0775, true);
        echo "Created directory: {$dir}\n";
    }
    
    if (is_writable($fullPath)) {
        echo "✅ {$dir} is writable\n";
    } else {
        // Try to fix permissions (works better on Unix-like systems)
        if (function_exists('chmod')) {
            chmod($fullPath, 0775);
        }
        echo "📝 Attempted to fix permissions for: {$dir}\n";
    }
}

// Create empty laravel.log if it doesn't exist
$logFile = __DIR__ . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'laravel.log';
if (!file_exists($logFile)) {
    touch($logFile);
    if (function_exists('chmod')) {
        chmod($logFile, 0664);
    }
    echo "📝 Created laravel.log file\n";
} else {
    // Ensure the log file is writable
    if (!is_writable($logFile)) {
        if (function_exists('chmod')) {
            chmod($logFile, 0664);
        }
        echo "📝 Fixed permissions for laravel.log\n";
    } else {
        echo "✅ laravel.log is writable\n";
    }
}

echo "✅ Storage permissions fixed!\n";
