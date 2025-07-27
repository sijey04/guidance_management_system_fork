<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 Image Storage Diagnostics\n\n";

// Check recent counseling images
$images = DB::table('counseling_images')->orderBy('created_at', 'desc')->limit(5)->get();

echo "📋 Recent Counseling Images:\n";
foreach ($images as $image) {
    echo "   ID: {$image->id}\n";
    echo "   Path: {$image->image_path}\n";
    echo "   Created: {$image->created_at}\n";
    
    // Check if file exists
    $fullPath = storage_path('app/public/' . $image->image_path);
    $exists = file_exists($fullPath) ? '✅ EXISTS' : '❌ MISSING';
    echo "   File Status: {$exists}\n";
    
    if (file_exists($fullPath)) {
        echo "   File Size: " . filesize($fullPath) . " bytes\n";
    }
    
    // Check URL accessibility
    $url = env('APP_URL') . '/storage/' . $image->image_path;
    echo "   Expected URL: {$url}\n";
    echo "   ---\n";
}

echo "\n🔗 Storage Configuration:\n";
echo "   public/storage exists: " . (file_exists('public/storage') ? '✅ YES' : '❌ NO') . "\n";
echo "   storage/app/public exists: " . (is_dir('storage/app/public') ? '✅ YES' : '❌ NO') . "\n";

if (is_dir('storage/app/public')) {
    echo "\n📁 Storage Directory Contents:\n";
    $files = array_diff(scandir('storage/app/public'), ['.', '..']);
    if (empty($files)) {
        echo "   (empty)\n";
    } else {
        foreach ($files as $file) {
            $path = 'storage/app/public/' . $file;
            if (is_dir($path)) {
                echo "   📁 {$file}/\n";
                $subFiles = array_diff(scandir($path), ['.', '..']);
                foreach (array_slice($subFiles, 0, 3) as $subFile) {
                    echo "      - {$subFile}\n";
                }
                if (count($subFiles) > 3) {
                    echo "      ... and " . (count($subFiles) - 3) . " more files\n";
                }
            } else {
                echo "   📄 {$file}\n";
            }
        }
    }
}

echo "\n🌐 URL Test:\n";
echo "   APP_URL: " . env('APP_URL') . "\n";
echo "   Storage URL Config: " . config('filesystems.disks.public.url') . "\n";

echo "\n✅ Diagnostics complete!\n";
