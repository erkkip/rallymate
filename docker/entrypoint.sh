#!/bin/sh
set -e
cd /var/www/html

if [ -z "$APP_KEY" ]; then
    echo "APP_KEY is not set. Generate one with: echo base64:\$(openssl rand -base64 32)" >&2
    exit 1
fi

# Create the SQLite file on the first start (the data dir is a volume).
if [ "$DB_CONNECTION" = "sqlite" ]; then
    mkdir -p "$(dirname "$DB_DATABASE")"
    [ -f "$DB_DATABASE" ] || touch "$DB_DATABASE"
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Artisan ran as root; Apache workers run as www-data. SQLite needs the
# directory writable too, for its journal files.
chown -R www-data:www-data storage bootstrap/cache
[ "$DB_CONNECTION" = "sqlite" ] && chown -R www-data:www-data "$(dirname "$DB_DATABASE")"

exec "$@"
