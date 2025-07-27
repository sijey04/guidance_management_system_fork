<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

use Illuminate\Support\Facades\DB;

try {
    DB::table('migrations')->insert([
        'migration' => '2025_07_24_121559_add_original_transition_id_to_student_transitions_table',
        'batch' => 4
    ]);
    
    echo "Migration marked as run successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
