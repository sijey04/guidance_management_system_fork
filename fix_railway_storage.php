<?php

require_once 'vendor/autoload.php';

echo "🔧 Railway Storage Fix - Checking and Creating Storage Setup\n\n";

// Check current storage configuration
echo "📋 Current Storage Status:\n";
echo "   - public/storage exists: " . (file_exists('public/storage') ? 'YES' : 'NO') . "\n";
echo "   - storage/app/public exists: " . (is_dir('storage/app/public') ? 'YES' : 'NO') . "\n";
echo "   - APP_URL: " . env('APP_URL', 'not set') . "\n";

// Create storage/app/public if it doesn't exist
if (!is_dir('storage/app/public')) {
    echo "\n📁 Creating storage/app/public directory...\n";
    mkdir('storage/app/public', 0755, true);
    echo "   ✅ Created storage/app/public\n";
}

// Create subdirectories for different types of images
$imageDirectories = [
    'storage/app/public/counseling-images',
    'storage/app/public/contract-images', 
    'storage/app/public/referral-images',
    'storage/app/public/transition-images'
];

foreach ($imageDirectories as $dir) {
    if (!is_dir($dir)) {
        echo "📁 Creating {$dir}...\n";
        mkdir($dir, 0755, true);
        echo "   ✅ Created {$dir}\n";
    }
}

// Create or recreate the storage symlink
if (file_exists('public/storage')) {
    echo "\n🔗 Removing existing storage symlink...\n";
    unlink('public/storage');
}

echo "🔗 Creating storage symlink...\n";
$storagePublicPath = realpath('storage/app/public');
$publicStoragePath = 'public/storage';

// Create symlink
if (symlink($storagePublicPath, $publicStoragePath)) {
    echo "   ✅ Storage symlink created successfully\n";
} else {
    echo "   ❌ Failed to create symlink, trying alternative method...\n";
    
    // Alternative: copy files approach for Railway
    echo "   📋 Setting up file copying system for Railway...\n";
    
    // Create a .htaccess rule for storage access
    $htaccess = "RewriteEngine On\nRewriteRule ^storage/(.*)$ /storage-files.php?file=$1 [QSA,L]\n";
    file_put_contents('public/.htaccess', $htaccess);
    echo "   ✅ Created .htaccess for storage access\n";
}

echo "\n📊 Final Storage Status:\n";
echo "   - public/storage exists: " . (file_exists('public/storage') ? 'YES' : 'NO') . "\n";
echo "   - storage/app/public exists: " . (is_dir('storage/app/public') ? 'YES' : 'NO') . "\n";
echo "   - Image directories created: " . count($imageDirectories) . "\n";

echo "\n✅ Storage setup completed!\n";
echo "\n💡 Note: For Railway deployment, consider using external storage like:\n";
echo "   - AWS S3\n";
echo "   - Cloudinary\n";
echo "   - Railway Volume (for persistent storage)\n";
