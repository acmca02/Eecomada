# =============================================================================
# Stage 1 : Builder (préparation des dépendances et assets)
# =============================================================================
FROM php:8.3-fpm-alpine AS builder

# Installation des dépendances système nécessaires pour les extensions PHP
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libzip-dev \
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

# Installation de Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /app

# Copie des fichiers de dépendances en premier → meilleur caching
COPY composer.json composer.lock* ./

# Installation des dépendances Composer (production uniquement)
RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-dev \
    --no-scripts \
    --no-autoloader

# Copie de TOUT le reste du projet
COPY . .
RUN chmod +x entrypoint.sh

# Installation et build des assets frontend (Vite, Laravel Mix, etc.)
RUN if [ -f package.json ]; then \
        npm ci --legacy-peer-deps && \
        npm run build && \
        rm -rf node_modules; \
    fi

# Finalisation Composer (autoloader + scripts)
RUN composer dump-autoload --optimize --classmap-authoritative --no-dev

# Permissions et optimisation Laravel
RUN chown -R www-data:www-data /app \
    && chmod -R 755 storage bootstrap/cache \
    && php artisan optimize:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan event:cache || true

# =============================================================================
# Stage 2 : Image finale (très légère)
# =============================================================================
FROM php:8.3-fpm-alpine

# Installation des dépendances runtime + outils de build temporaires
RUN apk add --no-cache --virtual .build-deps \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    && apk add --no-cache \
        libpng \
        libjpeg-turbo \
        freetype \
        libzip \
        oniguruma \
        nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        zip \
        opcache \
    && apk del .build-deps \
    && rm -rf /var/cache/apk/* /tmp/*

# Copie de l'application depuis le builder
WORKDIR /var/www/html
COPY --from=builder --chown=www-data:www-data /app /var/www/html

# Configuration Nginx
COPY nginx.conf /etc/nginx/http.d/default.conf

# Fichier php.ini custom (optionnel mais recommandé)
COPY php.ini-production /usr/local/etc/php/conf.d/zz-custom.ini

# Exposition du port (Render redirige vers $PORT)
EXPOSE 80

# Healthcheck pour Render
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD wget --no-verbose --tries=1 --spider http://localhost/health || wget --no-verbose --tries=1 http://localhost || exit 1

# Démarrage : PHP-FPM + Nginx
CMD sh -c " \
    php artisan migrate --force --no-interaction && \
    php artisan storage:link || true && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php-fpm && nginx -g 'daemon off;' \
"
