@echo off
cls
echo ==========================================
echo    RAILWAY DEPLOYMENT PREPARATION
echo ==========================================
echo.

echo [1/5] Checking Laravel installation...
if not exist "artisan" (
    echo ERROR: Not a Laravel project!
    pause
    exit /b 1
)
echo ✓ Laravel project detected

echo.
echo [2/5] Installing/updating dependencies...
echo Installing PHP dependencies...
composer install --optimize-autoloader --no-dev --quiet
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed!
    pause
    exit /b 1
)
echo ✓ PHP dependencies installed

echo.
echo Installing Node.js dependencies...
npm install --silent
if %errorlevel% neq 0 (
    echo ERROR: NPM install failed!
    pause
    exit /b 1
)
echo ✓ Node.js dependencies installed

echo.
echo [3/5] Building assets...
npm run build --silent
if %errorlevel% neq 0 (
    echo ERROR: Asset build failed!
    pause
    exit /b 1
)
echo ✓ Assets built successfully

echo.
echo [4/5] Optimizing Laravel...
php artisan config:clear --quiet
php artisan config:cache --quiet
php artisan route:cache --quiet
php artisan view:cache --quiet
echo ✓ Laravel optimized

echo.
echo [5/5] Generating deployment info...
echo.
echo ==========================================
echo    DEPLOYMENT READY!
echo ==========================================
echo.
echo Your APP_KEY: 
php artisan key:generate --show
echo.
echo NEXT STEPS:
echo 1. Push your code to GitHub
echo 2. Connect Railway to your GitHub repo
echo 3. Add MySQL database service in Railway
echo 4. Add environment variables (see RAILWAY_QUICK_GUIDE.md)
echo 5. Deploy!
echo.
echo ==========================================
echo.
pause
