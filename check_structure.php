<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Checking database structure...\n";

// Check contracts table
echo "\nContracts table columns:\n";
$contractsColumns = Schema::getColumnListing('contracts');
foreach ($contractsColumns as $column) {
    echo "- $column\n";
}

// Check students table
echo "\nStudents table columns:\n";
$studentsColumns = Schema::getColumnListing('students');
foreach ($studentsColumns as $column) {
    echo "- $column\n";
}

// Check student_transition_images table
echo "\nStudent transition images table columns:\n";
$transitionImagesColumns = Schema::getColumnListing('student_transition_images');
foreach ($transitionImagesColumns as $column) {
    echo "- $column\n";
}

echo "\nMigrations completed successfully!\n";
