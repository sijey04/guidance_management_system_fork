<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🧪 Testing Railway Volume Storage\n\n";

// Create a test file in the storage directory
$testDir = storage_path('app/public/counseling-images');
$testFile = $testDir . '/test-volume.txt';

echo "📁 Creating test directory: {$testDir}\n";
if (!is_dir($testDir)) {
    mkdir($testDir, 0755, true);
    echo "   ✅ Directory created\n";
} else {
    echo "   ℹ️  Directory already exists\n";
}

echo "📄 Creating test file: {$testFile}\n";
$content = "Test file created at " . date('Y-m-d H:i:s') . " to verify Railway volume persistence.";
file_put_contents($testFile, $content);

if (file_exists($testFile)) {
    echo "   ✅ Test file created successfully\n";
    echo "   📏 File size: " . filesize($testFile) . " bytes\n";
    echo "   📖 Content: " . file_get_contents($testFile) . "\n";
} else {
    echo "   ❌ Failed to create test file\n";
}

// Test URL accessibility
$testUrl = env('APP_URL') . '/storage/counseling-images/test-volume.txt';
echo "\n🌐 Test URL: {$testUrl}\n";

echo "\n📊 Storage Directory Contents:\n";
if (is_dir($testDir)) {
    $files = array_diff(scandir($testDir), ['.', '..']);
    if (empty($files)) {
        echo "   (empty)\n";
    } else {
        foreach ($files as $file) {
            echo "   - {$file}\n";
        }
    }
}

echo "\n✅ Volume test completed!\n";
