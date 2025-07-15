# Railway Deployment Guide for Laravel Guidance Management System

## Prerequisites

1. **Railway Account**: Sign up at [railway.app](https://railway.app)
2. **Git Repository**: Your code should be in a Git repository (GitHub, GitLab, etc.)
3. **Node.js**: Required for Railway CLI
4. **Composer**: For PHP dependencies

## Step-by-Step Deployment

### Option 1: Using Railway CLI (Recommended)

1. **Install Railway CLI**:
   ```bash
   npm install -g @railway/cli
   ```

2. **Login to Railway**:
   ```bash
   railway login
   ```

3. **Initialize Railway Project**:
   ```bash
   railway init
   ```

4. **Add MySQL Database**:
   ```bash
   railway add --database mysql
   ```

5. **Set Environment Variables**:
   ```bash
   railway variables set APP_ENV=production
   railway variables set APP_DEBUG=false
   railway variables set APP_KEY=$(php artisan key:generate --show)
   ```

6. **Deploy**:
   ```bash
   railway up
   ```

### Option 2: Using Railway Dashboard

1. **Connect Repository**:
   - Go to [railway.app](https://railway.app)
   - Click "New Project"
   - Connect your GitHub/GitLab repository

2. **Add Database**:
   - In your project dashboard, click "Add Service"
   - Select "Database" → "MySQL"

3. **Configure Environment Variables**:
   - Go to your service settings
   - Add these variables:
     ```
     APP_ENV=production
     APP_DEBUG=false
     APP_KEY=base64:YourGeneratedKey
     ```

4. **Deploy**:
   - Railway will automatically deploy when you push to your repository

## Environment Variables Setup

Railway automatically provides database connection variables. Your app will use:

- `MYSQL_HOST` - Database host
- `MYSQL_PORT` - Database port  
- `MYSQL_DATABASE` - Database name
- `MYSQL_USER` - Database username
- `MYSQL_PASSWORD` - Database password

## Database Migration

After deployment, run migrations:

```bash
railway run php artisan migrate --force
```

## Domain Setup

1. Go to your Railway project dashboard
2. Click on "Settings" → "Domains"
3. Add your custom domain or use the provided railway.app subdomain

## Post-Deployment Checklist

- [ ] Database is connected and migrations are run
- [ ] Environment variables are set correctly
- [ ] Application is accessible via the provided URL
- [ ] SSL certificate is active
- [ ] File uploads work (if applicable)
- [ ] Email configuration is working (if applicable)

## Troubleshooting

### Common Issues:

1. **Build Failures**:
   - Check that all dependencies are in `composer.json`
   - Ensure Node.js build completes successfully

2. **Database Connection**:
   - Verify environment variables are set
   - Check database service is running

3. **Asset Issues**:
   - Run `npm run build` before deployment
   - Check Vite configuration

### Logs:
```bash
railway logs
```

### Connect to Database:
```bash
railway connect mysql
```

## Files Created for Deployment

- `Dockerfile` - Container configuration
- `railway.json` - Railway-specific configuration
- `Procfile` - Process definition
- `.dockerignore` - Files to ignore during build
- `.env.production` - Production environment template
- `deploy.sh` / `deploy.bat` - Deployment scripts

## Support

For issues specific to Railway, check:
- [Railway Documentation](https://docs.railway.app)
- [Railway Community](https://discord.gg/railway)
- [Railway Status](https://status.railway.app)

## Security Notes

- Never commit `.env` files to version control
- Use Railway's environment variables for sensitive data
- Enable HTTPS in production
- Regular backups of your database
