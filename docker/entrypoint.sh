#!/bin/bash

until nc -z database 3306; do
	echo "Waiting for MySQL to be ready..."
	sleep 2;
done

if [ ! -f "vendor/autoload.php" ]; then
  composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

php artisan migrate:fresh --seed --force
php artisan optimize
php artisan view:cache

npm run build

chown -R www-data:www-data /var/www/storage

php-fpm -D
nginx -g "daemon off;"
