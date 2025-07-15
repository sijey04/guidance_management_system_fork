@echo off
echo 🚀 Setting up Railway environment variables...
echo.

REM Core Application Variables
railway variables set APP_NAME="Guidance Management System"
railway variables set APP_ENV="production"
railway variables set APP_KEY="base64:Dyc9UPHkyv844Lr3d+KpnUN8+ZY1VIDyy1ln8qEaM8w="
railway variables set APP_DEBUG="false"
railway variables set APP_URL="https://guidancemanagementsystem-production.up.railway.app/"

REM Database Configuration (Railway MySQL)
railway variables set DB_CONNECTION="mysql"
railway variables set DB_HOST="%MYSQLHOST%"
railway variables set DB_PORT="%MYSQLPORT%"
railway variables set DB_DATABASE="%MYSQLDATABASE%"
railway variables set DB_USERNAME="%MYSQLUSER%"
railway variables set DB_PASSWORD="%MYSQLPASSWORD%"

REM Cache & Session
railway variables set CACHE_STORE="database"
railway variables set SESSION_DRIVER="database"
railway variables set SESSION_LIFETIME="120"
railway variables set SESSION_ENCRYPT="false"
railway variables set SESSION_PATH="/"
railway variables set SESSION_DOMAIN=""
railway variables set SESSION_SECURE_COOKIE="true"

REM Queue
railway variables set QUEUE_CONNECTION="database"

REM Broadcasting (Disabled)
railway variables set BROADCAST_CONNECTION="log"
railway variables set PUSHER_APP_ID=""
railway variables set PUSHER_APP_KEY=""
railway variables set PUSHER_APP_SECRET=""
railway variables set PUSHER_APP_CLUSTER=""
railway variables set PUSHER_HOST=""

REM Reverb (Disabled)
railway variables set REVERB_APP_ID=""
railway variables set REVERB_APP_KEY=""
railway variables set REVERB_APP_SECRET=""
railway variables set REVERB_HOST=""

REM Mail
railway variables set MAIL_MAILER="log"
railway variables set MAIL_FROM_ADDRESS="noreply@your-app.com"
railway variables set MAIL_FROM_NAME="Guidance Management System"

REM File Storage
railway variables set FILESYSTEM_DISK="local"

REM AWS (Empty)
railway variables set AWS_ACCESS_KEY_ID=""
railway variables set AWS_SECRET_ACCESS_KEY=""
railway variables set AWS_DEFAULT_REGION="us-east-1"
railway variables set AWS_BUCKET=""

REM Redis (Empty)
railway variables set REDIS_HOST="127.0.0.1"
railway variables set REDIS_PASSWORD=""
railway variables set REDIS_PORT="6379"

REM Logging
railway variables set LOG_CHANNEL="stack"
railway variables set LOG_LEVEL="error"

REM Third-party Services (Empty)
railway variables set ABLY_KEY=""
railway variables set POSTMARK_TOKEN=""
railway variables set RESEND_KEY=""

REM Database Cache
railway variables set DB_CACHE_CONNECTION=""
railway variables set DB_CACHE_LOCK_CONNECTION=""
railway variables set DB_CACHE_LOCK_TABLE=""

REM Memcached
railway variables set MEMCACHED_HOST="127.0.0.1"
railway variables set MEMCACHED_PERSISTENT_ID=""
railway variables set MEMCACHED_USERNAME=""
railway variables set MEMCACHED_PASSWORD=""

REM SSL
railway variables set MYSQL_ATTR_SSL_CA=""

echo.
echo ✅ Essential environment variables have been set!
echo 🔄 Railway will automatically redeploy your application.
echo.
pause
