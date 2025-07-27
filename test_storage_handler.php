<?php

// Test script to check storage handler and image paths
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use Illuminate\Support\Facades\DB;

echo "🔍 Testing Storage Handler\n";
echo "========================\n\n";

// Check database images
echo "📊 Database Images:\n";
try {
    $images = DB::table('counseling_images')->get();
    echo "Found " . count($images) . " images in database\n";
    
    foreach ($images as $image) {
        echo "- ID: {$image->id}, Path: {$image->image_path}\n";
        
        // Check if file exists
        $fullPath = storage_path('app/public/' . $image->image_path);
        $exists = file_exists($fullPath) ? "✅ EXISTS" : "❌ NOT FOUND";
        echo "  File: {$fullPath} - {$exists}\n";
    }
} catch (Exception $e) {
    echo "❌ Error accessing database: " . $e->getMessage() . "\n";
}

echo "\n📁 Storage Directory Structure:\n";
$storagePublic = storage_path('app/public');
echo "Base path: {$storagePublic}\n";

if (is_dir($storagePublic)) {
    $directories = array_filter(scandir($storagePublic), function($item) use ($storagePublic) {
        return is_dir($storagePublic . '/' . $item) && !in_array($item, ['.', '..']);
    });
    
    foreach ($directories as $dir) {
        $dirPath = $storagePublic . '/' . $dir;
        $fileCount = count(array_filter(scandir($dirPath), function($item) use ($dirPath) {
            return is_file($dirPath . '/' . $item);
        }));
        echo "📂 {$dir}/ ({$fileCount} files)\n";
    }
} else {
    echo "❌ Storage directory not found\n";
}

echo "\n🌐 Testing Storage URL Handler:\n";
echo "Test URL: /storage/counseling_images/test.jpg would resolve to:\n";
echo storage_path('app/public/counseling_images/test.jpg') . "\n";

echo "\n✅ Test complete!\n";
