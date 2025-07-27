<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "📁 Storage Directory Analysis\n\n";

$baseDir = storage_path('app/public');
echo "Base storage directory: {$baseDir}\n";
echo "Directory exists: " . (is_dir($baseDir) ? 'YES' : 'NO') . "\n\n";

$subDirs = ['counseling-images', 'contract-images', 'referral-images', 'transition-images'];

foreach ($subDirs as $subDir) {
    $fullPath = $baseDir . '/' . $subDir;
    echo "📂 {$subDir}/\n";
    echo "   Path: {$fullPath}\n";
    echo "   Exists: " . (is_dir($fullPath) ? 'YES' : 'NO') . "\n";
    
    if (is_dir($fullPath)) {
        $files = array_diff(scandir($fullPath), ['.', '..']);
        echo "   Files: " . count($files) . "\n";
        foreach (array_slice($files, 0, 5) as $file) {
            $filePath = $fullPath . '/' . $file;
            $size = is_file($filePath) ? filesize($filePath) : 0;
            echo "     - {$file} ({$size} bytes)\n";
        }
        if (count($files) > 5) {
            echo "     ... and " . (count($files) - 5) . " more files\n";
        }
    }
    echo "\n";
}

// Check specific file
$targetFile = $baseDir . '/counseling_images/Q9DMqcDQyGz0Dhl5ZFfEq3o4M70Xg3z6EHEmITrF.jpg';
echo "🎯 Checking specific target file:\n";
echo "   Path: {$targetFile}\n";
echo "   Exists: " . (file_exists($targetFile) ? 'YES' : 'NO') . "\n";

// Also check with hyphen version
$targetFile2 = $baseDir . '/counseling-images/Q9DMqcDQyGz0Dhl5ZFfEq3o4M70Xg3z6EHEmITrF.jpg';
echo "   Alternative path: {$targetFile2}\n";
echo "   Exists: " . (file_exists($targetFile2) ? 'YES' : 'NO') . "\n";

echo "\n✅ Analysis complete!\n";
