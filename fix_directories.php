<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Fixing Storage Directory Structure\n\n";

$baseDir = storage_path('app/public');
$correctDirs = ['counseling_images', 'contract_images', 'referral_images', 'transition_images'];

echo "📁 Creating correct directory structure (with underscores):\n";
foreach ($correctDirs as $dir) {
    $path = $baseDir . '/' . $dir;
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "   ✅ Created: {$dir}/\n";
    } else {
        echo "   ℹ️  Already exists: {$dir}/\n";
    }
}

echo "\n📊 Final directory structure:\n";
$allDirs = array_diff(scandir($baseDir), ['.', '..']);
foreach ($allDirs as $dir) {
    $fullPath = $baseDir . '/' . $dir;
    if (is_dir($fullPath)) {
        $files = array_diff(scandir($fullPath), ['.', '..']);
        echo "   📂 {$dir}/ (" . count($files) . " files)\n";
    } else {
        echo "   📄 {$dir}\n";
    }
}

echo "\n✅ Directory structure fixed!\n";
echo "Now images should upload correctly to the right directories.\n";
