FROM php:8.2-apache

COPY docker/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Install system dependencies
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

# Install Node.js 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Composer settings
ENV COMPOSER_MAX_PARALLEL_HTTP=2
ENV COMPOSER_PROCESS_TIMEOUT=900
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies with retry
# Install PHP dependencies using Git source
# Avoid GitHub codeload ZIP HTTP 429
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --prefer-source \
    --no-interaction \
    --no-progress

# Install and build Vite
RUN npm ci && npm run build

# Apache Laravel public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Laravel directories + permissions
RUN mkdir -p \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache \
    && chmod -R 775 \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]