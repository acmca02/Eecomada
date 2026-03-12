# Base : PHP 8.3 avec FPM + Nginx (très stable pour Laravel 11/12)
FROM php:8.3-fpm-alpine

# Install dépendances système + extensions PHP courantes pour Laravel
RUN apk add --no-cache \
    nginx \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /var/www/html

# Copie ton projet
COPY . .

# Permissions + install deps
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 storage bootstrap/cache \
    && composer install --no-dev --optimize-autoloader

# Cache Laravel (optionnel mais accélère)
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Copie config Nginx
COPY nginx.conf /etc/nginx/http.d/default.conf

# Port (Render attend 10000 par défaut, mais on expose 80)
EXPOSE 80

# Démarre PHP-FPM + Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
