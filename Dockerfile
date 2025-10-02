# Use the official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copy custom PHP configuration for upload limits
COPY docker/php/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev
RUN composer dump-autoload --optimize

# Install Node.js dependencies and build assets
RUN npm install
RUN npm run build

# Configure Apache
RUN a2enmod rewrite

# Update Apache configuration to point to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Create a proper Apache virtual host configuration
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot ${APACHE_DOCUMENT_ROOT}\n\
    <Directory ${APACHE_DOCUMENT_ROOT}>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Create required storage directories and set permissions
RUN mkdir -p /var/www/html/storage/logs \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/app/public \
    /var/www/html/bootstrap/cache

# Set correct ownership and permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Create laravel.log file with proper permissions
RUN touch /var/www/html/storage/logs/laravel.log
RUN chown www-data:www-data /var/www/html/storage/logs/laravel.log
RUN chmod 664 /var/www/html/storage/logs/laravel.log

# Create a start script that waits for database and handles environment properly
RUN echo '#!/bin/bash\n\
echo "Starting Laravel application..."\n\
echo "Setting up storage permissions..."\n\
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache\n\
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache\n\
touch /var/www/html/storage/logs/laravel.log\n\
chown www-data:www-data /var/www/html/storage/logs/laravel.log\n\
chmod 664 /var/www/html/storage/logs/laravel.log\n\
echo "Storage permissions set!"\n\
echo "Waiting for database connection..."\n\
until php artisan tinker --execute="try { DB::connection()->getPdo(); echo \"Database connected\"; } catch (Exception \$e) { echo \"Database not ready: \" . \$e->getMessage(); exit(1); }" 2>/dev/null; do\n\
  echo "Waiting for database..."\n\
  sleep 2\n\
done\n\
echo "Database is ready!"\n\
echo "Running Laravel optimizations..."\n\
php artisan config:clear --quiet\n\
php artisan route:clear --quiet\n\
php artisan view:clear --quiet\n\
composer dump-autoload --optimize\n\
php artisan config:cache --quiet\n\
php artisan route:cache --quiet\n\
php artisan view:cache --quiet\n\
echo "Running database migrations..."\n\
php artisan migrate --force --no-interaction\n\
echo "Checking if deleted_at column exists..."\n\
php artisan tinker --execute="try { Schema::hasColumn(\"contracts\", \"deleted_at\") ? print(\"deleted_at column exists\") : print(\"deleted_at column missing\"); } catch (Exception \$e) { print(\"Error checking column: \" . \$e->getMessage()); }"\n\
echo "Laravel application ready!"\n\
apache2-foreground' > /var/www/html/start.sh

RUN chmod +x /var/www/html/start.sh

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["/var/www/html/start.sh"]
