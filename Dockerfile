# -------------------------- Stage 1: Builder --------------------------
FROM php:8.3-fpm-alpine AS builder

# Install dépendances système + extensions courantes Laravel
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        zip \
        opcache

# Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copie fichiers de deps en premier (cache layer)
COPY composer.json composer.lock ./

# Install prod deps + optimisation
RUN composer install \
    --no-interaction \
    --no-dev \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# Copie le reste du projet
COPY . .

# Build assets frontend si tu utilises Vite / Mix / Laravel Breeze / etc.
RUN if [ -f package.json ]; then \
        npm ci && \
        npm run build && \
        rm -rf node_modules; \
    fi

# Permissions (sécurisé)
RUN chown -R www-data:www-data /app \
    && chmod -R 755 storage bootstrap/cache

# Cache Laravel (accélère le démarrage)
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

# -------------------------- Stage 2: Final image (très légère) --------------------------
FROM php:8.3-fpm-alpine

# Même extensions que le builder
RUN apk add --no-cache \
    libpng \
    libjpeg-turbo \
    freetype \
    oniguruma \
    libzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        zip \
        opcache

# Nginx
RUN apk add --no-cache nginx

# Copie depuis builder
COPY --from=builder --chown=www-data:www-data /app /var/www/html

# Configuration Nginx (fichier séparé)
COPY nginx.conf /etc/nginx/http.d/default.conf

# Copie php.ini production + opcache tuning
COPY php.ini-production /usr/local/etc/php/conf.d/zz-custom.ini

# Port exposé (Render attend généralement 10000, mais on mappe 80 → $PORT)
EXPOSE 80

# Healthcheck (Render adore ça)
HEALTHCHECK --interval=30s --timeout=3s \
  CMD wget --no-verbose --tries=1 --spider http://localhost:80 || exit 1

# Démarrage : PHP-FPM + Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
