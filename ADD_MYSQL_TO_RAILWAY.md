# 🗄️ Adding MySQL Database to Railway

## Step-by-Step Guide

### **Step 1: Add MySQL Service in Railway**

1. **Go to your Railway project dashboard**
   - URL: `https://railway.app/project/[your-project-id]`

2. **Click "+ New Service"**
   - Look for the purple button in your dashboard

3. **Select "Database"**
   - Choose from the available options

4. **Choose "MySQL"**
   - Railway supports MySQL 8.0

5. **Wait for provisioning**
   - Takes about 30-60 seconds

### **Step 2: Railway Auto-Creates These Variables**

Once MySQL is added, Railway automatically creates:
```
MYSQL_HOST=containers-us-west-xxx.railway.app
MYSQL_PORT=6543
MYSQL_DATABASE=railway
MYSQL_USER=root
MYSQL_PASSWORD=abc123xyz789
MYSQL_URL=mysql://root:abc123xyz789@containers-us-west-xxx.railway.app:6543/railway
```

### **Step 3: Configure Laravel to Use MySQL**

Your Laravel app needs these variables to connect to MySQL:

```
DB_CONNECTION=mysql
DB_HOST=$MYSQL_HOST
DB_PORT=$MYSQL_PORT
DB_DATABASE=$MYSQL_DATABASE
DB_USERNAME=$MYSQL_USER
DB_PASSWORD=$MYSQL_PASSWORD
```

### **Step 4: Add Database Variables to Your App**

**Option A: Manual (Railway Dashboard)**
1. Go to your **web service** (not the database service)
2. Click "Variables" tab
3. Add these variables:
   ```
   DB_CONNECTION=mysql
   DB_HOST=$MYSQL_HOST
   DB_PORT=$MYSQL_PORT
   DB_DATABASE=$MYSQL_DATABASE
   DB_USERNAME=$MYSQL_USER
   DB_PASSWORD=$MYSQL_PASSWORD
   ```

**Option B: Using Railway CLI**
```bash
railway variables set DB_CONNECTION="mysql"
railway variables set DB_HOST='$MYSQL_HOST'
railway variables set DB_PORT='$MYSQL_PORT'
railway variables set DB_DATABASE='$MYSQL_DATABASE'
railway variables set DB_USERNAME='$MYSQL_USER'
railway variables set DB_PASSWORD='$MYSQL_PASSWORD'
```

### **Step 5: Run Database Migrations**

After adding the database, run migrations:
```bash
# Connect to your Railway project
railway login
railway link

# Run migrations
railway run php artisan migrate --force
```

### **Step 6: Verify Database Connection**

Check if the database is working:
```bash
# Test database connection
railway run php artisan tinker
# In tinker, run:
DB::connection()->getPdo();
```

## 🔧 **Troubleshooting**

### **Database Connection Issues**
1. **Check if MySQL service is running**
   - Go to Railway dashboard → MySQL service
   - Should show "Active" status

2. **Verify environment variables**
   - In your web service → Variables
   - Ensure DB_* variables are set correctly

3. **Check database credentials**
   - In MySQL service → Connect tab
   - Copy the connection details

### **Migration Issues**
```bash
# If migrations fail, try:
railway run php artisan config:clear
railway run php artisan migrate:refresh --force
```

### **Connection Timeout**
```bash
# Add these variables if you get timeout errors:
railway variables set DB_TIMEOUT="60"
railway variables set MYSQL_ATTR_CONNECT_TIMEOUT="60"
```

## 📋 **Quick Checklist**

- [ ] MySQL service added to Railway project
- [ ] MySQL service is "Active" 
- [ ] Database variables added to web service
- [ ] Application redeployed automatically
- [ ] Migrations run successfully
- [ ] Database connection verified

## 🎯 **Expected Result**

After completing these steps:
- ✅ MySQL database running on Railway
- ✅ Laravel app connected to database
- ✅ Database tables created via migrations
- ✅ Application fully functional

## 💡 **Pro Tips**

1. **Database Backups**: Railway automatically backs up your database
2. **Multiple Environments**: Create separate databases for staging/production
3. **Database Browser**: Use Railway's built-in database browser
4. **Monitoring**: Check database metrics in Railway dashboard

Your Laravel app should now be connected to MySQL on Railway! 🚀
