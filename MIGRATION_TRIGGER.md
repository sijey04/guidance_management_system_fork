# Migration Trigger

This file was created to trigger a Railway deployment that will run the pending migration to add the `deleted_at` column to the contracts table.

Date: July 30, 2025
Issue: Missing `deleted_at` column causing UnexpectedValueException
Solution: Deploy to trigger automatic migration execution
