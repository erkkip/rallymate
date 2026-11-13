# Production image: PHP 8.2 + Apache, SQLite, built Vite assets.
# Expects to run behind a TLS-terminating reverse proxy (see TrustProxies).

FROM composer:2 AS composer-bin

FROM php:8.2-apache AS base
RUN apt-get update \
 && apt-get install -y --no-install-recommends unzip \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-ext-install opcache \
 && a2enmod rewrite \
 && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf

# PHP dependencies (no dev packages).
FROM base AS vendor
COPY --from=composer-bin /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# Frontend assets. app.js and tailwind.config.js read from vendor/masmerise.
FROM node:20-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY --from=vendor /app/vendor/masmerise ./vendor/masmerise
RUN npm run build

FROM base
WORKDIR /var/www/html
COPY . .
COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build
COPY --from=composer-bin /usr/bin/composer /usr/bin/composer
RUN composer dump-autoload --optimize --no-dev --no-interaction \
 && rm /usr/bin/composer \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod +x docker/entrypoint.sh

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    DB_CONNECTION=sqlite \
    DB_DATABASE=/var/www/html/database/data/database.sqlite

VOLUME /var/www/html/database/data
EXPOSE 80
ENTRYPOINT ["docker/entrypoint.sh"]
CMD ["apache2-foreground"]
