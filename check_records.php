<?php

require_once 'vendor/autoload.php';

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "📊 Database Records Count:\n";
echo "   Counselings: " . DB::table('counselings')->count() . "\n";
echo "   Counseling Images: " . DB::table('counseling_images')->count() . "\n";
echo "   Contracts: " . DB::table('contracts')->count() . "\n";
echo "   Students: " . DB::table('students')->count() . "\n";

if (DB::table('counseling_images')->count() > 0) {
    echo "\n📷 Sample Counseling Images:\n";
    $images = DB::table('counseling_images')->limit(3)->get();
    foreach ($images as $image) {
        echo "   - ID: {$image->id}, Path: {$image->image_path}\n";
        $fullPath = storage_path('app/public/' . $image->image_path);
        echo "     File exists: " . (file_exists($fullPath) ? 'YES' : 'NO') . "\n";
    }
}

echo "\n✅ Done!\n";
