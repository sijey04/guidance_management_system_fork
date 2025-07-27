<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "🔍 Checking Counseling Image Details\n\n";

// Check the structure of counseling_images table
echo "📋 Counseling Images Table Structure:\n";
$columns = DB::select('DESCRIBE counseling_images');
foreach ($columns as $column) {
    echo "   - {$column->Field} ({$column->Type})\n";
}

echo "\n📷 Recent Counseling Images:\n";
$images = DB::table('counseling_images')->orderBy('id', 'desc')->limit(3)->get();
foreach ($images as $image) {
    echo "   ID: {$image->id}\n";
    echo "   Counseling ID: {$image->counseling_id}\n";
    echo "   Image Path: {$image->image_path}\n";
    echo "   Type: " . ($image->type ?? 'NULL') . "\n";
    echo "   Created: {$image->created_at}\n";
    
    // Check if file exists
    $fullPath = storage_path('app/public/' . $image->image_path);
    echo "   File exists: " . (file_exists($fullPath) ? 'YES' : 'NO') . "\n";
    echo "   ---\n";
}

echo "\n🎯 Checking Counseling ID 3 specifically:\n";
$counseling3Images = DB::table('counseling_images')->where('counseling_id', 3)->get();
echo "   Total images for counseling 3: " . count($counseling3Images) . "\n";
foreach ($counseling3Images as $img) {
    echo "   - ID: {$img->id}, Type: " . ($img->type ?? 'NULL') . ", Path: {$img->image_path}\n";
}

echo "\n✅ Done!\n";
