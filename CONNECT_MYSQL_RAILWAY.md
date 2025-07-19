# 🗄️ Connect Your Laravel App to Railway MySQL

## ✅ MySQL Database Status
Your MySQL database is successfully created on Railway with these details:
- **Host**: `mysql.railway.internal`
- **Port**: `3306`
- **Database**: `railway`
- **User**: `root`
- **Password**: `********` (hidden)

## 🔧 Configure Laravel Database Connection

### **Step 1: Add Database Variables to Your Web Service**

Go to your **web service** (guidance_management_system) → Variables tab and add these:

```
DB_CONNECTION=mysql
DB_HOST=$MYSQLHOST
DB_PORT=$MYSQLPORT
DB_DATABASE=$MYSQLDATABASE
DB_USERNAME=$MYSQLUSER
DB_PASSWORD=$MYSQLPASSWORD
```

### **Step 2: Run the Setup Script**

Your setup script is already updated with the correct variable names. Run it:

```bash
# Using Railway CLI
railway login
railway link
bash setup-railway-vars.sh
```

### **Step 3: Verify Database Connection**

After adding the variables, Railway will automatically redeploy your app. Then run:

```bash
# Run database migrations
railway run php artisan migrate --force

# Test database connection
railway run php artisan tinker
# In tinker, run: DB::connection()->getPdo();
```

## 🚀 Quick Manual Setup

If you prefer to add variables manually:

1. **Go to your web service** (not the MySQL service)
2. **Click Variables tab**
3. **Add these variables one by one**:
   - `DB_CONNECTION` → `mysql`
   - `DB_HOST` → `$MYSQLHOST`
   - `DB_PORT` → `$MYSQLPORT`
   - `DB_DATABASE` → `$MYSQLDATABASE`
   - `DB_USERNAME` → `$MYSQLUSER`
   - `DB_PASSWORD` → `$MYSQLPASSWORD`

## 📋 What Happens Next

1. Railway will automatically redeploy your app
2. Your Laravel app will connect to the MySQL database
3. You can run migrations to create database tables
4. Your app will be fully functional with persistent data storage

## 🎯 Expected Database Connection

Your Laravel app will connect to:
- **Host**: `mysql.railway.internal` (internal Railway network)
- **Port**: `3306` (standard MySQL port)
- **Database**: `railway` (default database name)
- **User**: `root` (database admin user)

## 🔍 Troubleshooting

If you encounter issues:

1. **Check variable references**: Make sure you're using `$MYSQLHOST` not `$MYSQL_HOST`
2. **Verify service linking**: Both services should be in the same Railway project
3. **Check deployment logs**: Look for database connection errors
4. **Test connection**: Use `railway run php artisan tinker` to test

Your MySQL database is ready to use! 🎉
