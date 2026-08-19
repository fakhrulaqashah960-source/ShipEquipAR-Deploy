FROM php:8.2-apache

# =========================================================
# PHP UPLOAD CONFIG
# =========================================================

COPY docker/uploads.ini /usr/local/etc/php/conf.d/uploads.ini


# =========================================================
# SYSTEM DEPENDENCIES
# =========================================================

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    ca-certificates \
    zip \
    curl \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        bcmath \
        zip \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# =========================================================
# NODE.JS 22
# =========================================================

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# =========================================================
# COMPOSER
# =========================================================

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# =========================================================
# WORKING DIRECTORY
# =========================================================

WORKDIR /var/www/html


# =========================================================
# COPY LARAVEL PROJECT
# =========================================================

COPY . .


# =========================================================
# COMPOSER SETTINGS
# =========================================================

ENV COMPOSER_MAX_PARALLEL_HTTP=2
ENV COMPOSER_PROCESS_TIMEOUT=900
ENV COMPOSER_ALLOW_SUPERUSER=1


# =========================================================
# INSTALL PHP DEPENDENCIES
# =========================================================

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --prefer-dist \
    --no-interaction \
    --no-progress


# =========================================================
# INSTALL FRONTEND + BUILD VITE
# =========================================================

RUN npm ci \
    && npm run build


# =========================================================
# APACHE DOCUMENT ROOT
# =========================================================

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf


# =========================================================
# LARAVEL DIRECTORIES
# =========================================================

RUN mkdir -p \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache \
    /var/www/html/public/uploads/reality


# =========================================================
# PERMISSIONS
# =========================================================

RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache \
        /var/www/html/public/uploads/reality \
    && chmod -R 775 \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache \
        /var/www/html/public/uploads/reality


# =========================================================
# APACHE SERVER NAME
# =========================================================
#
# Removes:
#
# AH00558: Could not reliably determine the server's
# fully qualified domain name
#

RUN echo "ServerName localhost" \
    >> /etc/apache2/apache2.conf


# =========================================================
# RENDER PORT
# =========================================================
#
# Render recommends binding the web server to $PORT.
#
# Default Render PORT = 10000.
#
# We set a default here, but the startup command below
# still respects Render's actual $PORT environment variable.
#

ENV PORT=10000

EXPOSE 10000


# =========================================================
# START APPLICATION
# =========================================================
#
# 1. Read Render PORT
# 2. Configure Apache Listen port
# 3. Configure VirtualHost port
# 4. Clear Laravel cached configuration
# 5. Sync .reality files from GitHub Release
# 6. Start Apache
#
# IMPORTANT:
#
# php artisan ar:sync || true
#
# keeps the website alive even if one sync attempt fails.
#

CMD ["sh", "-c", "\
PORT=${PORT:-10000}; \
echo \"========================================\"; \
echo \"ShipEquipAR starting\"; \
echo \"Apache port: ${PORT}\"; \
echo \"========================================\"; \
sed -ri \"s/^Listen [0-9]+/Listen ${PORT}/\" /etc/apache2/ports.conf; \
sed -ri \"s/<VirtualHost \\*:[0-9]+>/<VirtualHost *:${PORT}>/\" /etc/apache2/sites-available/000-default.conf; \
php artisan optimize:clear || true; \
echo \"========================================\"; \
echo \"Syncing AR Reality models...\"; \
echo \"========================================\"; \
php artisan ar:sync || true; \
echo \"========================================\"; \
echo \"Starting Apache on port ${PORT}\"; \
echo \"========================================\"; \
exec apache2-foreground \
"]