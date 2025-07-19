# 🚀 QUICK GUIDE: Add MySQL to Railway

## 1️⃣ **Add MySQL Service**
```
Railway Dashboard → + New Service → Database → MySQL
```

## 2️⃣ **Wait for Auto-Creation**
Railway creates these variables automatically:
- `MYSQL_HOST`
- `MYSQL_PORT` 
- `MYSQL_DATABASE`
- `MYSQL_USER`
- `MYSQL_PASSWORD`

## 3️⃣ **Configure Your Web Service**
Go to your **web service** → Variables → Add these:
```
DB_CONNECTION=mysql
DB_HOST=$MYSQL_HOST
DB_PORT=$MYSQL_PORT
DB_DATABASE=$MYSQL_DATABASE
DB_USERNAME=$MYSQL_USER
DB_PASSWORD=$MYSQL_PASSWORD
```

## 4️⃣ **Run Migrations**
```bash
railway run php artisan migrate --force
```

## 5️⃣ **Done!** ✅
Your Laravel app is now connected to MySQL on Railway.

---

**Current Status:** Your app is successfully deployed at:
`https://guidancemanagementsystem-production.up.railway.app/`

**Next Step:** Add MySQL database service to complete the setup.
