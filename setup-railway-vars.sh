#!/bin/bash

# Railway Environment Variables Setup Script
# This script adds all necessary environment variables to Railway

echo "🚀 Setting up Railway environment variables..."

# Core Application Variables
railway variables set APP_NAME="Guidance Management System"
railway variables set APP_ENV="production"
railway variables set APP_KEY="base64:Dyc9UPHkyv844Lr3d+KpnUN8+ZY1VIDyy1ln8qEaM8w="
railway variables set APP_DEBUG="false"
railway variables set APP_URL="https://guidancemanagementsystem-production.up.railway.app/"
railway variables set ASSET_URL="https://guidancemanagementsystem-production.up.railway.app/"

# Database Configuration (Railway MySQL)
railway variables set DB_CONNECTION="mysql"
railway variables set DB_HOST='$MYSQLHOST'
railway variables set DB_PORT='$MYSQLPORT'
railway variables set DB_DATABASE='$MYSQLDATABASE'
railway variables set DB_USERNAME='$MYSQLUSER'
railway variables set DB_PASSWORD='$MYSQLPASSWORD'

# Cache & Session
railway variables set CACHE_STORE="database"
railway variables set SESSION_DRIVER="database"
railway variables set SESSION_LIFETIME="120"
railway variables set SESSION_ENCRYPT="false"
railway variables set SESSION_PATH="/"
railway variables set SESSION_DOMAIN=""
railway variables set SESSION_SECURE_COOKIE="true"

# Queue
railway variables set QUEUE_CONNECTION="database"

# Broadcasting (Disabled)
railway variables set BROADCAST_CONNECTION="log"
railway variables set PUSHER_APP_ID=""
railway variables set PUSHER_APP_KEY=""
railway variables set PUSHER_APP_SECRET=""
railway variables set PUSHER_APP_CLUSTER=""
railway variables set PUSHER_HOST=""
railway variables set PUSHER_PORT="443"
railway variables set PUSHER_SCHEME="https"

# Reverb (Disabled)
railway variables set REVERB_APP_ID=""
railway variables set REVERB_APP_KEY=""
railway variables set REVERB_APP_SECRET=""
railway variables set REVERB_HOST=""

# Mail
railway variables set MAIL_MAILER="log"
railway variables set MAIL_HOST=""
railway variables set MAIL_PORT=""
railway variables set MAIL_USERNAME=""
railway variables set MAIL_PASSWORD=""
railway variables set MAIL_ENCRYPTION=""
railway variables set MAIL_FROM_ADDRESS="noreply@your-app.com"
railway variables set MAIL_FROM_NAME="Guidance Management System"

# File Storage
railway variables set FILESYSTEM_DISK="local"

# AWS (Empty)
railway variables set AWS_ACCESS_KEY_ID=""
railway variables set AWS_SECRET_ACCESS_KEY=""
railway variables set AWS_DEFAULT_REGION="us-east-1"
railway variables set AWS_BUCKET=""
railway variables set AWS_URL=""
railway variables set AWS_ENDPOINT=""

# Redis (Empty)
railway variables set REDIS_HOST="127.0.0.1"
railway variables set REDIS_PASSWORD=""
railway variables set REDIS_PORT="6379"
railway variables set REDIS_USERNAME=""
railway variables set REDIS_URL=""

# Logging
railway variables set LOG_CHANNEL="stack"
railway variables set LOG_STACK="single"
railway variables set LOG_DEPRECATIONS_CHANNEL=""
railway variables set LOG_LEVEL="error"
railway variables set LOG_SLACK_WEBHOOK_URL=""
railway variables set LOG_STDERR_FORMATTER=""

# Third-party Services (Empty)
railway variables set ABLY_KEY=""
railway variables set POSTMARK_TOKEN=""
railway variables set POSTMARK_MESSAGE_STREAM_ID=""
railway variables set RESEND_KEY=""
railway variables set SLACK_BOT_USER_OAUTH_TOKEN=""
railway variables set SLACK_BOT_USER_DEFAULT_CHANNEL=""

# Database Cache
railway variables set DB_CACHE_CONNECTION=""
railway variables set DB_CACHE_LOCK_CONNECTION=""
railway variables set DB_CACHE_LOCK_TABLE=""

# Memcached
railway variables set MEMCACHED_HOST="127.0.0.1"
railway variables set MEMCACHED_PERSISTENT_ID=""
railway variables set MEMCACHED_USERNAME=""
railway variables set MEMCACHED_PASSWORD=""

# Papertrail
railway variables set PAPERTRAIL_URL=""
railway variables set PAPERTRAIL_PORT=""

# Queue Database
railway variables set DB_QUEUE_CONNECTION=""

# SQS
railway variables set SQS_SUFFIX=""

# SSL
railway variables set MYSQL_ATTR_SSL_CA=""

echo "✅ All environment variables have been set!"
echo "🔄 Railway will automatically redeploy your application."
