# -------------------------- Stage 2: Final image (très légère) --------------------------
FROM php:8.3-fpm-alpine AS final

RUN apk add --no-cache --virtual .build-deps \
    libpng-dev libjpeg-turbo-dev freetype-dev libzip-dev oniguruma-dev \
    && apk add --no-cache \
        libpng libjpeg-turbo freetype libzip oniguruma nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql mbstring exif pcntl bcmath zip opcache \
    && apk del .build-deps \
    && rm -rf /var/cache/apk/* /tmp/*

# Le reste reste identique : COPY depuis builder, nginx.conf, php.ini, etc.
COPY --from=builder --chown=www-data:www-data /app /var/www/html
COPY nginx.conf /etc/nginx/http.d/default.conf
COPY php.ini-production /usr/local/etc/php/conf.d/zz-custom.ini

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=3s \
  CMD wget --no-verbose --tries=1 --spider http://localhost:80 || exit 1

CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
