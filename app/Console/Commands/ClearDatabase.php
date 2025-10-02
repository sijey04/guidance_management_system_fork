<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ClearDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:clear {--force : Force the operation without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all data from the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!$this->option('force')) {
            if (!$this->confirm('This will delete ALL data from the database. Are you sure?')) {
                $this->info('Operation cancelled.');
                return;
            }
        }

        $this->info('Starting database cleanup...');

        try {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            // Get all table names
            $tables = DB::select('SHOW TABLES');
            $databaseName = env('DB_DATABASE');
            $tableColumn = "Tables_in_{$databaseName}";

            $clearedTables = [];

            foreach ($tables as $table) {
                $tableName = $table->{$tableColumn};
                
                // Skip migrations table to preserve schema
                if ($tableName === 'migrations') {
                    continue;
                }

                try {
                    DB::table($tableName)->truncate();
                    $clearedTables[] = $tableName;
                    $this->line("✓ Cleared table: {$tableName}");
                } catch (\Exception $e) {
                    $this->error("✗ Failed to clear table {$tableName}: " . $e->getMessage());
                }
            }

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            $this->info("\n🎉 Database cleared successfully!");
            $this->info("Cleared " . count($clearedTables) . " tables.");
            
            if (!empty($clearedTables)) {
                $this->line("\nCleared tables:");
                foreach ($clearedTables as $table) {
                    $this->line("  - {$table}");
                }
            }

        } catch (\Exception $e) {
            $this->error("Failed to clear database: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}