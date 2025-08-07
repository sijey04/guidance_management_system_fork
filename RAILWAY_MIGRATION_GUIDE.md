# Railway Migration Commands

## Option 1: Using Railway CLI (Recommended)

If you have Railway CLI installed, run:

```bash
# Connect to your Railway project
railway login

# Link to your project (if not already linked)
railway link 40809680-c540-496f-bf13-77e1924bd283

# Run migrations
railway run php artisan migrate --force

# Run specific seeder (UserSeeder)
railway run php artisan db:seed --class=UserSeeder --force

# Or run the custom seeding script
railway run bash railway_seed.sh
```

## Option 2: Using Railway Web Terminal

1. Go to your Railway project dashboard
2. Navigate to your service
3. Click on "Terminal" or "Shell"
4. Run: `php artisan migrate --force`
5. Run seeder: `php artisan db:seed --class=UserSeeder --force`
6. Or run the custom script: `bash railway_seed.sh`

## Option 3: Trigger Deployment (Current Dockerfile should handle this)

The Dockerfile already includes migration commands. To force a new deployment:
- Make a small commit to trigger redeployment
- The startup script will run migrations automatically

## Option 4: Direct Database Connection

If you need to run migrations directly on the database, you would need the database connection details from Railway environment variables.
railway run php artisan migrate --force