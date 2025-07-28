<?php

// Storage file handler for Railway deployment
// This file serves images from storage/app/public when accessed via /storage URL

// Bootstrap Laravel to access helper functions
require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$requestedFile = $_GET['file'] ?? '';

if (empty($requestedFile)) {
    http_response_code(404);
    exit('File not found');
}

// Security: Prevent directory traversal
$requestedFile = str_replace('..', '', $requestedFile);
$requestedFile = ltrim($requestedFile, '/');

// Build the actual file path using Laravel's storage_path helper
$filePath = storage_path('app/public/' . $requestedFile);

// Check if file exists
if (!file_exists($filePath) || !is_file($filePath)) {
    http_response_code(404);
    exit('File not found');
}

// Get file info
$fileInfo = pathinfo($filePath);
$extension = strtolower($fileInfo['extension'] ?? '');

// Set appropriate content type
$mimeTypes = [
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'bmp' => 'image/bmp',
    'webp' => 'image/webp',
    'svg' => 'image/svg+xml',
    'pdf' => 'application/pdf',
    'doc' => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
];

$contentType = $mimeTypes[$extension] ?? 'application/octet-stream';

// Set headers
header('Content-Type: ' . $contentType);
header('Content-Length: ' . filesize($filePath));
header('Cache-Control: public, max-age=31536000'); // Cache for 1 year
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');

// Output the file
readfile($filePath);
exit;
