<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportSqlFile extends Command
{
    protected $signature = 'db:import {file}';
    protected $description = 'Import SQL file into database';

    public function handle()
    {
        $filePath = $this->argument('file');
        
        if (!File::exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }
        
        $sql = File::get($filePath);
        
        // Remove SQL comments and split into statements
        $sql = preg_replace('/\/\*.*?\*\//s', '', $sql);
        $sql = preg_replace('/^--.*$/m', '', $sql);
        
        // Split by semicolon but be careful with data containing semicolons
        $statements = [];
        $current = '';
        $inString = false;
        $stringChar = '';
        
        for ($i = 0; $i < strlen($sql); $i++) {
            $char = $sql[$i];
            
            if (!$inString && ($char === '"' || $char === "'")) {
                $inString = true;
                $stringChar = $char;
            } elseif ($inString && $char === $stringChar) {
                $inString = false;
                $stringChar = '';
            } elseif (!$inString && $char === ';') {
                $statement = trim($current);
                if (!empty($statement)) {
                    $statements[] = $statement;
                }
                $current = '';
                continue;
            }
            
            $current .= $char;
        }
        
        // Add last statement if exists
        $statement = trim($current);
        if (!empty($statement)) {
            $statements[] = $statement;
        }
        
        $this->info("Found " . count($statements) . " SQL statements");
        
        try {
            DB::beginTransaction();
            
            foreach ($statements as $index => $statement) {
                $statement = trim($statement);
                if (empty($statement)) continue;
                
                // Skip certain statements that might cause issues
                if (stripos($statement, 'SET SQL_MODE') === 0 ||
                    stripos($statement, 'START TRANSACTION') === 0 ||
                    stripos($statement, 'COMMIT') === 0 ||
                    stripos($statement, 'SET time_zone') === 0 ||
                    stripos($statement, 'SET @OLD_') === 0 ||
                    stripos($statement, 'SET NAMES') === 0 ||
                    stripos($statement, '/*!') === 0) {
                    continue;
                }
                
                try {
                    DB::statement($statement);
                    $this->info("Executed statement " . ($index + 1));
                } catch (\Exception $e) {
                    $this->warn("Skipped statement " . ($index + 1) . ": " . $e->getMessage());
                }
            }
            
            DB::commit();
            $this->info("SQL file imported successfully!");
            
        } catch (\Exception $e) {
            DB::rollback();
            $this->error("Error importing SQL file: " . $e->getMessage());
            return 1;
        }
        
        return 0;
    }
}
