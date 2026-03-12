#!/bin/sh
php artisan migrate --force --no-interaction
php artisan storage:link
exec "$@"
