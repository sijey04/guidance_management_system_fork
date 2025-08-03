# Migration Trigger

This file was created to trigger a Railway deployment that will run the pending migration to add the `deleted_at` column to the contracts table.

Date: July 30, 2025 - Updated: August 4, 2025
Issue: Missing `deleted_at` column causing UnexpectedValueException
Solution: Deploy to trigger automatic migration execution

## Migration Status
- Trigger deployment to run: `2025_07_25_005042_add_deleted_at_to_contracts_table.php`
- This will add the `deleted_at` column for soft deletes functionality
- After successful migration, SoftDeletes can be re-enabled in Contract model
