#!/bin/bash

# Railway Deployment Script for Laravel
echo "🚀 Starting Railway deployment preparation..."

# Install Railway CLI if not installed
if ! command -v railway &> /dev/null; then
    echo "📦 Installing Railway CLI..."
    npm install -g @railway/cli
fi

# Login to Railway (if not already logged in)
echo "🔐 Please login to Railway..."
railway login

# Initialize Railway project
echo "📋 Initializing Railway project..."
railway init

# Add MySQL database
echo "🗄️ Adding MySQL database..."
railway add --database mysql

# Set environment variables
echo "🔧 Setting environment variables..."
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set APP_KEY=$(php artisan key:generate --show)

# Deploy the application
echo "🚢 Deploying to Railway..."
railway up

echo "✅ Deployment complete!"
echo "🌐 Your application should be available at the URL provided by Railway."
echo ""
echo "⚠️ Don't forget to:"
echo "1. Set up your domain in Railway dashboard"
echo "2. Configure your database migrations"
echo "3. Set up any additional environment variables"
