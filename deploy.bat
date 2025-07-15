@echo off
echo 🚀 Starting Railway deployment preparation...

:: Check if Railway CLI is installed
railway --version >nul 2>&1
if %errorlevel% neq 0 (
    echo 📦 Installing Railway CLI...
    npm install -g @railway/cli
)

:: Login to Railway
echo 🔐 Please login to Railway...
railway login

:: Initialize Railway project
echo 📋 Initializing Railway project...
railway init

:: Add MySQL database
echo 🗄️ Adding MySQL database...
railway add --database mysql

:: Generate APP_KEY
echo 🔑 Generating application key...
php artisan key:generate --show > temp_key.txt
set /p APP_KEY=<temp_key.txt
del temp_key.txt

:: Set environment variables
echo 🔧 Setting environment variables...
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set APP_KEY=%APP_KEY%

:: Deploy the application
echo 🚢 Deploying to Railway...
railway up

echo ✅ Deployment complete!
echo 🌐 Your application should be available at the URL provided by Railway.
echo.
echo ⚠️ Don't forget to:
echo 1. Set up your domain in Railway dashboard
echo 2. Configure your database migrations
echo 3. Set up any additional environment variables
pause
