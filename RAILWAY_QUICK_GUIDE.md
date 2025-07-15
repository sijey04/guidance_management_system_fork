# 🚀 Railway Deployment - Quick Steps

## What to Add in Railway Variables Section

### 1. Click "+ New Variable" and add these ONE BY ONE:

**Core Variables:**
```
Variable Name: APP_NAME
Value: Guidance Management System

Variable Name: APP_ENV  
Value: production

Variable Name: APP_KEY
Value: base64:Dyc9UPHkyv844Lr3d+KpnUN8+ZY1VIDyy1ln8qEaM8w=

Variable Name: APP_DEBUG
Value: false

Variable Name: APP_URL
Value: https://your-app-name.railway.app
```

**Database & Session:**
```
Variable Name: SESSION_DRIVER
Value: database

Variable Name: SESSION_LIFETIME
Value: 120

Variable Name: CACHE_STORE
Value: database

Variable Name: QUEUE_CONNECTION
Value: database
```

**Logging:**
```
Variable Name: LOG_CHANNEL
Value: stack

Variable Name: LOG_LEVEL
Value: error
```

### 2. Add MySQL Database Service

1. In Railway dashboard, click "**+ New Service**"
2. Select "**Database**" → "**MySQL**"
3. Railway will automatically create these variables:
   - MYSQL_HOST
   - MYSQL_PORT
   - MYSQL_DATABASE
   - MYSQL_USER
   - MYSQL_PASSWORD

### 3. Deploy Your Application

#### Option A: GitHub Integration (Recommended)
1. Push your code to GitHub
2. In Railway, click "**+ New Service**"
3. Select "**GitHub Repo**"
4. Connect your repository
5. Railway will automatically deploy

#### Option B: Railway CLI
```bash
npm install -g @railway/cli
railway login
railway link
railway up
```

### 4. After Deployment

Run database migrations:
```bash
railway run php artisan migrate --force
```

## 📋 Deployment Checklist

- [ ] All environment variables added
- [ ] MySQL database service created
- [ ] GitHub repository connected
- [ ] Application deployed successfully
- [ ] Database migrations completed
- [ ] Application accessible via Railway URL

## 🔧 Troubleshooting

**If deployment fails:**
1. Check Railway logs for errors
2. Verify all environment variables are set
3. Ensure MySQL service is running
4. Check if migrations completed successfully

**Common issues:**
- Missing APP_KEY
- Database connection errors
- Asset build failures
- Permission issues

## 🌐 Your App Will Be Available At:
`https://your-app-name.railway.app`

Replace "your-app-name" with your actual Railway app name.
