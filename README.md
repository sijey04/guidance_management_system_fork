# 🎓 Guidance Management System

<p align="center">
<img src="https://img.shields.io/badge/Laravel-12.x-red.svg" alt="Laravel Version">
<img src="https://img.shields.io/badge/PHP-8.2-blue.svg" alt="PHP Version">
<img src="https://img.shields.io/badge/MySQL-8.0-orange.svg" alt="MySQL Version">
<img src="https://img.shields.io/badge/Railway-Deployed-success.svg" alt="Railway Deployment">
</p>

## 📋 About This Project

The Guidance Management System is a comprehensive web application built with Laravel 12 for managing student guidance and counseling activities. This system helps educational institutions track student progress, manage counseling sessions, and maintain detailed records.

### 🚀 Features

- **Student Management**: Comprehensive student profiles and tracking
- **Counseling Records**: Detailed counseling session management
- **Reporting System**: Generate reports and analytics
- **User Authentication**: Secure login and role-based access
- **File Management**: Upload and manage documents
- **Responsive Design**: Mobile-friendly interface

### 🛠️ Built With

- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Blade Templates, Alpine.js, Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **PDF Generation**: DomPDF
- **Excel Export**: Laravel Excel

## 🌐 Live Demo

🔗 **[View Live Application](https://your-app-name.railway.app)**

## 📦 Installation & Setup

### Local Development

### Local Development

```bash
# Clone the repository
git clone https://github.com/AthenaMaia/guidance_management_system.git
cd guidance_management_system

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env file
# Then run migrations
php artisan migrate

# Build assets
npm run build

# Start development server
php artisan serve
```

## 🚀 Railway Deployment

This application is configured for easy deployment on Railway. Follow these steps:

### Step 1: Add Environment Variables in Railway

In your Railway project Variables section, add these variables:

#### **Essential Variables:**
```
APP_NAME=Guidance Management System
APP_ENV=production
APP_KEY=base64:Dyc9UPHkyv844Lr3d+KpnUN8+ZY1VIDyy1ln8qEaM8w=
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app
```

#### **Session & Cache:**
```
SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database
QUEUE_CONNECTION=database
```

#### **Mail Configuration (Optional):**
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME=Guidance Management System
```

### Step 2: Add MySQL Database

1. In Railway dashboard, click "**+ New Service**"
2. Select "**Database**" → "**MySQL**"
3. Railway will automatically provide database environment variables

### Step 3: Deploy

#### Option A: Using Railway CLI
```bash
# Install Railway CLI
npm install -g @railway/cli

# Login and deploy
railway login
railway link
railway up
```

#### Option B: GitHub Integration
1. Push your code to GitHub
2. Connect Railway to your GitHub repository
3. Railway will automatically deploy on push

### Step 4: Run Database Migrations
```bash
# After deployment, run migrations
railway run php artisan migrate --force
```

## 📋 Post-Deployment Checklist

- [ ] Environment variables configured
- [ ] MySQL database added and connected
- [ ] Database migrations completed
- [ ] Application accessible via Railway URL
- [ ] File uploads working
- [ ] Email configuration tested (if applicable)

## 🔧 Project Structure

```
guidance_management_system/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/              # Eloquent models
│   ├── Exports/             # Excel export classes
│   └── Imports/             # Excel import classes
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   ├── views/              # Blade templates
│   ├── js/                 # JavaScript files
│   └── css/                # CSS files
├── routes/
│   └── web.php             # Web routes
└── public/                 # Public assets
```

## 🛡️ Security Features

- CSRF protection on all forms
- XSS protection with Blade templating
- SQL injection prevention with Eloquent ORM
- Authentication and authorization
- Input validation and sanitization

## 📊 Database Schema

The system includes the following main entities:

- **Users**: System users with role-based access
- **Students**: Student profiles and information
- **Counseling**: Counseling session records
- **Contracts**: Student contracts and agreements
- **Referrals**: Student referral management
- **Reports**: System reports and analytics

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

For support and questions:
- Create an issue in this repository
- Contact the development team

## 🚀 Railway Deployment Files

- `Dockerfile` - Container configuration
- `railway.json` - Railway deployment settings
- `Procfile` - Process definitions
- `.dockerignore` - Build exclusions
- `RAILWAY_DEPLOYMENT.md` - Detailed deployment guide
